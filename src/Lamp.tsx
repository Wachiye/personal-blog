import { useCallback, useEffect, useRef, useState } from "react";
import gsap from "gsap";
import { sound } from "./sound";

const KEY = "jw-lamp", HINT = "jw-lamp-used";
const reduced = () => matchMedia("(prefers-reduced-motion: reduce)").matches;

export default function Lamp() {
  const [on, setOn] = useState(() => { try { return localStorage.getItem(KEY) === "1"; } catch { return false; } });
  const [used, setUsed] = useState(() => { try { return localStorage.getItem(HINT) === "1"; } catch { return false; } });
  const lamp = useRef<HTMLDivElement>(null);
  const cord = useRef<SVGLineElement>(null);
  const knob = useRef<HTMLButtonElement>(null);
  const shade = useRef<HTMLDivElement>(null);
  const layer = useRef<HTMLDivElement>(null);
  const drag = useRef<{ y0: number; dy: number; moved: boolean } | null>(null);
  const skipClick = useRef(false);

  const toggle = useCallback(() => {
    setOn((v) => {
      const n = !v;
      try { localStorage.setItem(KEY, n ? "1" : "0"); localStorage.setItem(HINT, "1"); } catch { /* ignore */ }
      return n;
    });
    setUsed(true);
    sound.blip(1400, 0.025, 0.06); setTimeout(() => sound.blip(700, 0.04, 0.05), 40);
    if (!reduced() && lamp.current) {
      gsap.fromTo(lamp.current, { rotate: gsap.utils.random(-9, 9) }, { rotate: 0, duration: 2.4, ease: "elastic.out(1.1,0.18)", overwrite: true });
    }
  }, []);

  // flicker on switch-on
  useEffect(() => {
    document.documentElement.classList.toggle("lamp-on", on);
    if (!layer.current) return;
    if (on && !reduced()) {
      gsap.timeline().set(layer.current, { opacity: 0 })
        .to(layer.current, { opacity: 1, duration: 0.05 }).to(layer.current, { opacity: 0.2, duration: 0.06 })
        .to(layer.current, { opacity: 1, duration: 0.04 }).to(layer.current, { opacity: 0.55, duration: 0.08, delay: 0.08 })
        .to(layer.current, { opacity: 1, duration: 0.25 });
    } else gsap.set(layer.current, { opacity: on ? 1 : 0 });
  }, [on]);

  // keyboard L
  useEffect(() => {
    const k = (e: KeyboardEvent) => {
      const t = e.target as HTMLElement;
      if (e.key.toLowerCase() !== "l" || e.metaKey || e.ctrlKey || e.altKey || t.closest("input,textarea,[contenteditable],.term")) return;
      toggle();
    };
    addEventListener("keydown", k); return () => removeEventListener("keydown", k);
  }, [toggle]);

  // light follows pointer, rAF-throttled, only while on
  useEffect(() => {
    if (!on) return;
    let x = -1, y = -1, raf = 0;
    const el = layer.current!;
    const center = () => { const r = shade.current?.getBoundingClientRect(); x = r ? r.left + r.width / 2 : innerWidth * 0.8; y = r ? Math.min(innerHeight * 0.55, r.bottom + 220) : innerHeight / 2; };
    const paint = () => {
      raf = 0;
      const r = shade.current?.getBoundingClientRect();
      const bx = r ? r.left + r.width / 2 : innerWidth * 0.8, by = r ? r.bottom - 6 : 120;
      const ang = Math.atan2(x - bx, y - by) * -180 / Math.PI;
      const len = Math.hypot(x - bx, y - by);
      el.style.setProperty("--lx", x + "px"); el.style.setProperty("--ly", y + "px");
      el.style.setProperty("--bx", bx + "px"); el.style.setProperty("--by", by + "px");
      el.style.setProperty("--ba", ang + "deg"); el.style.setProperty("--bl", len + "px");
    };
    const q = () => { if (!raf) raf = requestAnimationFrame(paint); };
    const mv = (e: PointerEvent) => { x = e.clientX; y = e.clientY; q(); };
    const tm = (e: TouchEvent) => { const t = e.touches[0]; if (t) { x = t.clientX; y = t.clientY; q(); } };
    center(); paint();
    addEventListener("pointermove", mv, { passive: true });
    addEventListener("touchmove", tm, { passive: true });
    addEventListener("resize", q);
    return () => { cancelAnimationFrame(raf); removeEventListener("pointermove", mv); removeEventListener("touchmove", tm); removeEventListener("resize", q); };
  }, [on]);

  // pull cord drag
  const down = (e: React.PointerEvent<HTMLButtonElement>) => {
    drag.current = { y0: e.clientY, dy: 0, moved: false };
    e.currentTarget.setPointerCapture(e.pointerId);
  };
  const move = (e: React.PointerEvent<HTMLButtonElement>) => {
    const d = drag.current; if (!d) return;
    d.dy = Math.max(0, Math.min(90, e.clientY - d.y0)); if (d.dy > 4) d.moved = true;
    gsap.set(knob.current, { y: d.dy }); cord.current?.setAttribute("y2", String(64 + d.dy));
  };
  const up = () => {
    const d = drag.current; drag.current = null; if (!d) return;
    const back = { v: d.dy };
    gsap.to(back, { v: 0, duration: reduced() ? 0 : 0.7, ease: "elastic.out(1.2,0.35)", onUpdate: () => { gsap.set(knob.current, { y: back.v }); cord.current?.setAttribute("y2", String(64 + back.v)); } });
    if (d.moved) { skipClick.current = true; if (d.dy > 24) toggle(); }
  };
  const click = () => { if (skipClick.current) { skipClick.current = false; return; } toggle(); };

  return (
    <>
      <div ref={layer} className="lamp-layer" aria-hidden="true"><div className="lamp-beam" /></div>
      <div ref={lamp} className={`lamp${on ? " is-on" : ""}`}>
        <div className="lamp-wire" />
        <div ref={shade} className="lamp-shade" aria-hidden="true">
          <svg viewBox="0 0 120 80" width="100%" height="100%">
            <defs>
              <linearGradient id="lsh" x1="0" x2="1"><stop offset="0" stopColor="#1f1f1f" /><stop offset=".5" stopColor="#3a3a3a" /><stop offset="1" stopColor="#151515" /></linearGradient>
              <radialGradient id="lbulb"><stop offset="0" stopColor="#fff8e1" /><stop offset=".6" stopColor="#ffd27a" /><stop offset="1" stopColor="#ffb347" stopOpacity="0" /></radialGradient>
            </defs>
            <rect x="52" y="0" width="16" height="10" rx="3" fill="#2a2a2a" />
            <path d="M44 10 H76 L112 70 Q60 80 8 70 Z" fill="url(#lsh)" stroke="#555" strokeWidth="1" />
            <path d="M14 69 Q60 77 106 69" stroke="var(--acc)" strokeWidth="2" fill="none" opacity=".9" />
            <circle className="lamp-bulb" cx="60" cy="72" r="13" fill="url(#lbulb)" />
          </svg>
        </div>
        <svg className="lamp-cord" viewBox="0 0 10 160" aria-hidden="true"><line ref={cord} x1="5" y1="0" x2="5" y2="64" stroke="currentColor" strokeWidth="1.5" /></svg>
        <button ref={knob} className="lamp-knob" aria-pressed={on} aria-label={on ? "Turn lamp off (L)" : "Turn lamp on (L)"}
          onPointerDown={down} onPointerMove={move} onPointerUp={up} onPointerCancel={up} onClick={click} data-cursor="pull">
          <span />
        </button>
        <span className={`lamp-hint${used ? " gone" : ""}`} aria-hidden="true">pull ↓</span>
      </div>
    </>
  );
}
