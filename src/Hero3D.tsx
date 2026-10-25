import { useEffect, useRef } from "react";
import * as THREE from "three";

/** Interactive server-node constellation: nodes, links, and data packets travelling between them. */
export default function Hero3D({ light }: { light: boolean }) {
  const host = useRef<HTMLDivElement>(null);
  const lightRef = useRef(light);
  lightRef.current = light;
  useEffect(() => {
    const el = host.current!;
    const mobile = window.innerWidth < 760;
    const N = mobile ? 70 : 150;
    const renderer = new THREE.WebGLRenderer({ antialias: !mobile, alpha: true, powerPreference: "high-performance" });
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, mobile ? 1.5 : 2));
    el.appendChild(renderer.domElement);
    renderer.domElement.setAttribute("aria-hidden", "true");
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(55, 1, 0.1, 100);
    camera.position.set(0, 0, 9);
    const group = new THREE.Group();
    scene.add(group);

    // nodes in a flattened shell
    const pos: THREE.Vector3[] = [];
    for (let i = 0; i < N; i++) {
      const v = new THREE.Vector3().randomDirection().multiplyScalar(2.5 + Math.random() * 2.2);
      v.x *= 1.6; v.y *= 0.9;
      pos.push(v);
    }
    const nodeGeo = new THREE.BufferGeometry().setFromPoints(pos);
    const sizes = new Float32Array(N).map(() => Math.random() < 0.08 ? 3.2 : 1 + Math.random());
    nodeGeo.setAttribute("size", new THREE.BufferAttribute(sizes, 1));
    const uniforms = { uTime: { value: 0 }, uColor: { value: new THREE.Color("#d4ff3a") }, uPx: { value: renderer.getPixelRatio() } };
    const nodeMat = new THREE.ShaderMaterial({
      uniforms, transparent: true, depthWrite: false, blending: THREE.AdditiveBlending,
      vertexShader: `attribute float size; uniform float uTime; uniform float uPx; varying float vA;
        void main(){ vec4 mv = modelViewMatrix*vec4(position,1.0);
          float tw = 0.75+0.25*sin(uTime*2.0+position.x*3.0+position.y*5.0);
          vA = tw; gl_PointSize = size*14.0*uPx*tw/(-mv.z)*3.0; gl_Position = projectionMatrix*mv; }`,
      fragmentShader: `uniform vec3 uColor; varying float vA;
        void main(){ float d=length(gl_PointCoord-0.5); float a=smoothstep(0.5,0.0,d); a=a*a;
          gl_FragColor=vec4(uColor, a*vA); }`,
    });
    group.add(new THREE.Points(nodeGeo, nodeMat));

    // links between near nodes
    const edges: [number, number][] = [];
    const linkPts: number[] = [];
    for (let i = 0; i < N; i++) {
      let c = 0;
      for (let j = i + 1; j < N && c < 3; j++) {
        if (pos[i].distanceTo(pos[j]) < 1.55) { edges.push([i, j]); c++; linkPts.push(pos[i].x, pos[i].y, pos[i].z, pos[j].x, pos[j].y, pos[j].z); }
      }
    }
    const linkGeo = new THREE.BufferGeometry();
    linkGeo.setAttribute("position", new THREE.Float32BufferAttribute(linkPts, 3));
    const linkMat = new THREE.LineBasicMaterial({ color: 0xf2efe6, transparent: true, opacity: 0.12 });
    group.add(new THREE.LineSegments(linkGeo, linkMat));

    // packets
    const P = mobile ? 18 : 40;
    const pk = Array.from({ length: P }, () => ({ e: Math.floor(Math.random() * edges.length), t: Math.random(), s: 0.25 + Math.random() * 0.6 }));
    const pkGeo = new THREE.BufferGeometry();
    const pkArr = new Float32Array(P * 3);
    pkGeo.setAttribute("position", new THREE.BufferAttribute(pkArr, 3));
    pkGeo.setAttribute("size", new THREE.BufferAttribute(new Float32Array(P).fill(2.2), 1));
    const pkMat = nodeMat.clone();
    pkMat.uniforms = { uTime: uniforms.uTime, uPx: uniforms.uPx, uColor: { value: new THREE.Color("#5ef0ff") } };
    group.add(new THREE.Points(pkGeo, pkMat));

    const mouse = { x: 0, y: 0, tx: 0, ty: 0 };
    const onMove = (e: PointerEvent) => { mouse.tx = (e.clientX / innerWidth - 0.5) * 2; mouse.ty = (e.clientY / innerHeight - 0.5) * 2; };
    window.addEventListener("pointermove", onMove);
    const resize = () => { const w = el.clientWidth, h = el.clientHeight; renderer.setSize(w, h, false); camera.aspect = w / h; camera.updateProjectionMatrix(); };
    resize();
    const ro = new ResizeObserver(resize); ro.observe(el);

    let visible = true;
    const io = new IntersectionObserver(([en]) => (visible = en.isIntersecting)); io.observe(el);
    const clock = new THREE.Clock();
    let raf = 0;
    const tick = () => {
      raf = requestAnimationFrame(tick);
      if (!visible || document.hidden) return;
      const dt = Math.min(clock.getDelta(), 0.05);
      uniforms.uTime.value += dt;
      const isLight = lightRef.current;
      uniforms.uColor.value.set(isLight ? "#3d5a00" : "#d4ff3a");
      pkMat.uniforms.uColor.value.set(isLight ? "#0a6f80" : "#5ef0ff");
      linkMat.color.set(isLight ? 0x111111 : 0xf2efe6);
      nodeMat.blending = pkMat.blending = isLight ? THREE.NormalBlending : THREE.AdditiveBlending;
      mouse.x += (mouse.tx - mouse.x) * 0.05; mouse.y += (mouse.ty - mouse.y) * 0.05;
      group.rotation.y += dt * 0.06 + (mouse.x * 0.4 - group.rotation.y) * 0.0;
      group.rotation.x = mouse.y * 0.25;
      camera.position.x = mouse.x * 0.8;
      camera.position.y = -window.scrollY * 0.002;
      camera.lookAt(0, 0, 0);
      pk.forEach((p, i) => {
        p.t += dt * p.s;
        if (p.t > 1) { p.t = 0; p.e = Math.floor(Math.random() * edges.length); }
        const [a, b] = edges[p.e] ?? [0, 0];
        const v = pos[a].clone().lerp(pos[b], p.t);
        pkArr[i * 3] = v.x; pkArr[i * 3 + 1] = v.y; pkArr[i * 3 + 2] = v.z;
      });
      pkGeo.attributes.position.needsUpdate = true;
      renderer.render(scene, camera);
    };
    tick();
    el.dataset.ready = "1";
    return () => {
      cancelAnimationFrame(raf); ro.disconnect(); io.disconnect();
      window.removeEventListener("pointermove", onMove);
      renderer.dispose(); nodeGeo.dispose(); linkGeo.dispose(); pkGeo.dispose();
      el.removeChild(renderer.domElement);
    };
  }, []);
  return <div ref={host} className="hero3d" />;
}
