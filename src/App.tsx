import { lazy, Suspense, useCallback, useEffect, useLayoutEffect, useRef, useState } from "react";
import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import Lenis from "lenis";
import { contact, jobs, skills, skillGroups, systems, education, awards, ticker, type SkillGroup } from "./profile";
import Terminal from "./Terminal";
import { sound } from "./sound";

gsap.registerPlugin(ScrollTrigger);
const Hero3D = lazy(() => import("./Hero3D"));
const rm = () => window.matchMedia("(prefers-reduced-motion: reduce)").matches;
const isTouch = () => window.matchMedia("(pointer: coarse)").matches;

function Split({ text, className }: { text: string; className?: string }) {
  let i = 0;
  return (
    <span className={className} aria-label={text} role="text">
      {text.split(" ").map((word, w) => (
        <span key={w} className="word" aria-hidden="true">
          {[...word].map((ch) => <span className="ch" key={i} style={{ ["--i" as string]: i++ }}>{ch}</span>)}
          {w < text.split(" ").length - 1 ? "\u00a0" : ""}
        </span>
      ))}
    </span>
  );
}

function Magnetic({ children, href, className = "", onClick, ...rest }: { children: React.ReactNode; href?: string; className?: string; onClick?: () => void; [k: string]: unknown }) {
  const ref = useRef<HTMLAnchorElement & HTMLButtonElement>(null);
  const move = (e: React.PointerEvent) => {
    if (rm() || isTouch()) return;
    const r = ref.current!.getBoundingClientRect();
    gsap.to(ref.current, { x: (e.clientX - r.left - r.width / 2) * 0.3, y: (e.clientY - r.top - r.height / 2) * 0.4, duration: 0.4 });
  };
  const leave = () => gsap.to(ref.current, { x: 0, y: 0, duration: 0.7, ease: "elastic.out(1,0.4)" });
  const props = { ref, className: `mag ${className}`, onPointerMove: move, onPointerLeave: leave, onPointerEnter: () => sound.blip(990, 0.03), ...rest };
  return href ? <a href={href} {...props}>{children}</a> : <button type="button" onClick={onClick} {...props}>{children}</button>;
}

function Clock() {
  const [t, setT] = useState("");
  useEffect(() => {
    const f = () => setT(new Intl.DateTimeFormat("en-GB", { timeZone: "Africa/Nairobi", hour: "2-digit", minute: "2-digit", second: "2-digit" }).format(new Date()));
    f(); const id = setInterval(f, 1000); return () => clearInterval(id);
  }, []);
  return <span className="clock" aria-label={`Local time ${t} East Africa Time`}><i />{t} EAT</span>;
}

function Cursor() {
  const dot = useRef<HTMLDivElement>(null), ring = useRef<HTMLDivElement>(null);
  useEffect(() => {
    if (isTouch() || rm()) return;
    document.documentElement.classList.add("has-cursor");
    const xd = gsap.quickTo(dot.current, "x", { duration: 0.08 }), yd = gsap.quickTo(dot.current, "y", { duration: 0.08 });
    const xr = gsap.quickTo(ring.current, "x", { duration: 0.45 }), yr = gsap.quickTo(ring.current, "y", { duration: 0.45 });
    const mv = (e: PointerEvent) => {
      xd(e.clientX); yd(e.clientY); xr(e.clientX); yr(e.clientY);
      const hot = (e.target as HTMLElement).closest("a,button,[data-hot],input");
      ring.current!.classList.toggle("hot", !!hot);
      const label = (e.target as HTMLElement).closest<HTMLElement>("[data-cursor]")?.dataset.cursor ?? "";
      ring.current!.dataset.label = label;
    };
    window.addEventListener("pointermove", mv);
    return () => { window.removeEventListener("pointermove", mv); document.documentElement.classList.remove("has-cursor"); };
  }, []);
  return <><div ref={ring} className="c-ring" aria-hidden="true" /><div ref={dot} className="c-dot" aria-hidden="true" /></>;
}

function Loader({ done }: { done: () => void }) {
  const [n, setN] = useState(0);
  const logs = ["Jeremiah Siranjofu Wachiye", "Fullstack Software Developer", "Computer Science"];
  useEffect(() => {
    const o = { v: 0 };
    const tw = gsap.to(o, { v: 100, duration: 1.4, ease: "power2.inOut", onUpdate: () => setN(Math.round(o.v)), onComplete: () => {
      gsap.to(".loader", { clipPath: "inset(0 0 100% 0)", duration: 0.8, ease: "expo.inOut", onComplete: done });
    } });
    return () => { tw.kill(); };
  }, [done]);
  return (
    <div className="loader" aria-hidden="true">
      <div className="loader-log">{logs.slice(0, Math.ceil((n / 100) * logs.length)).map((l) => <div key={l}>&gt; {l}</div>)}</div>
      <div className="loader-n">{String(n).padStart(3, "0")}</div>
    </div>
  );
}

export default function App() {
  const reduced = useRef(rm()).current;
  const [loaded, setLoaded] = useState(reduced);
  const [light, setLight] = useState(false);
  const [term, setTerm] = useState(false);
  const [snd, setSnd] = useState(false);
  const [show3d, setShow3d] = useState(false);
  const [group, setGroup] = useState<SkillGroup | "All">("All");
  const [hovSkill, setHovSkill] = useState<string | null>(null);
  const [activeJob, setActiveJob] = useState(0);
  const wide = () => matchMedia("(min-width:900px)").matches;
  const workMetrics = () => {
    const sec = document.getElementById("work")!;
    const top = sec.getBoundingClientRect().top + scrollY;
    return { top, dist: Math.max(1, sec.offsetHeight - innerHeight) };
  };
  useEffect(() => {
    const cards = [...document.querySelectorAll<HTMLElement>(".job")];
    const n = cards.length;
    let io: IntersectionObserver | null = null;
    const fit = () => {
      const list = document.querySelector<HTMLElement>(".job-list");
      cards.forEach((c) => {
        c.style.setProperty("--fit", "1");
        if (!wide() || !list) return;
        const k = Math.min(1, (list.clientHeight - 4) / c.offsetHeight);
        c.style.setProperty("--fit", String(k));
      });
    };
    const onScroll = () => {
      if (!wide()) return;
      const { top, dist } = workMetrics();
      const p = Math.min(0.9999, Math.max(0, (scrollY - top) / dist));
      setActiveJob(Math.floor(p * n));
    };
    const setup = () => {
      io?.disconnect(); io = null;
      fit();
      if (!wide()) {
        io = new IntersectionObserver((ents) => ents.forEach((e) => e.isIntersecting && setActiveJob(cards.indexOf(e.target as HTMLElement))),
          { rootMargin: "-45% 0px -50% 0px" });
        cards.forEach((c) => io!.observe(c));
      } else onScroll();
    };
    setup();
    addEventListener("scroll", onScroll, { passive: true });
    addEventListener("resize", setup);
    document.fonts?.ready.then(fit);
    return () => { io?.disconnect(); removeEventListener("scroll", onScroll); removeEventListener("resize", setup); };
  }, []);
  const jumpTo = (i: number) => {
    const behavior: ScrollBehavior = rm() ? "auto" : "smooth";
    if (!wide()) return document.getElementById(`job-${i}`)?.scrollIntoView({ behavior, block: "center" });
    const { top, dist } = workMetrics();
    const n = document.querySelectorAll(".job").length;
    scrollTo({ top: top + dist * ((i + 0.5) / n), behavior });
  };
  const root = useRef<HTMLDivElement>(null);
  const finishLoad = useCallback(() => setLoaded(true), []);

  const toggleTheme = useCallback(() => {
    const flip = () => setLight((l) => { document.documentElement.dataset.theme = l ? "dark" : "light"; return !l; });
    const d = document as Document & { startViewTransition?: (cb: () => void) => unknown };
    if (d.startViewTransition && !rm()) d.startViewTransition(flip); else flip();
    sound.blip(440, 0.1);
  }, []);
  const toggleSound = useCallback(() => { const v = sound.toggle(); setSnd(v); return v; }, []);
  const print = useCallback(() => window.print(), []);

  // 3D after idle, never with reduced motion
  useEffect(() => {
    if (reduced) return;
    const ok = (() => { try { return !!document.createElement("canvas").getContext("webgl2"); } catch { return false; } })();
    if (!ok) return;
    const id = ("requestIdleCallback" in window ? (window as any).requestIdleCallback : setTimeout)(() => setShow3d(true), { timeout: 1500 });
    return () => ("cancelIdleCallback" in window ? (window as any).cancelIdleCallback(id) : clearTimeout(id));
  }, [reduced]);

  // keyboard
  useEffect(() => {
    const k = (e: KeyboardEvent) => {
      if ((e.metaKey || e.ctrlKey) && e.key.toLowerCase() === "k") { e.preventDefault(); setTerm((t) => !t); }
      else if (e.key === "`" && !(e.target as HTMLElement).closest("input")) { e.preventDefault(); setTerm(true); }
    };
    window.addEventListener("keydown", k); return () => window.removeEventListener("keydown", k);
  }, []);

  // smooth scroll
  useEffect(() => {
    if (reduced) return;
    const lenis = new Lenis({ lerp: 0.1 });
    lenis.on("scroll", ScrollTrigger.update);
    const f = (t: number) => lenis.raf(t * 1000);
    gsap.ticker.add(f); gsap.ticker.lagSmoothing(0);
    document.querySelectorAll<HTMLAnchorElement>('a[href^="#"]').forEach((a) => a.addEventListener("click", (e) => {
      const el = document.querySelector(a.getAttribute("href")!); if (!el) return; e.preventDefault(); lenis.scrollTo(el as HTMLElement, { offset: 0 });
    }));
    return () => { gsap.ticker.remove(f); lenis.destroy(); };
  }, [reduced]);

  // scroll choreography
  useLayoutEffect(() => {
    if (reduced || !loaded) return;
    const ctx = gsap.context(() => {
      gsap.from(".hero .ch", { yPercent: 120, rotate: 12, opacity: 0, stagger: 0.04, duration: 1.1, ease: "expo.out" });
      gsap.from(".hero-fade", { y: 30, opacity: 0, stagger: 0.08, duration: 1, delay: 0.4, ease: "power3.out" });
      gsap.to(".hero-title", { yPercent: -35, ease: "none", scrollTrigger: { trigger: ".hero", start: "top top", end: "bottom top", scrub: true } });

      // manifesto word reveal (pinned)
      gsap.fromTo(".manifesto .w", { opacity: 0.3 }, { opacity: 1, stagger: 0.1, ease: "none",
        scrollTrigger: { trigger: ".manifesto", start: "top top", end: "+=140%", scrub: true, pin: true } });

      // stacked experience reveal (narrow screens only; wide uses pinned one-at-a-time cards)
      if (!matchMedia("(min-width:900px)").matches) gsap.utils.toArray<HTMLElement>(".job").forEach((el) =>
        gsap.from(el, { y: 70, opacity: 0, duration: 1, ease: "power3.out", scrollTrigger: { trigger: el, start: "top 90%" } }));
      gsap.utils.toArray<HTMLElement>(".reveal").forEach((el) =>
        gsap.from(el, { y: 60, opacity: 0, duration: 1, ease: "power3.out", scrollTrigger: { trigger: el, start: "top 88%" } }));
      gsap.utils.toArray<HTMLElement>(".big-type").forEach((el) =>
        gsap.from(el.querySelectorAll(".ch"), { yPercent: 100, opacity: 0, stagger: 0.02, duration: 0.8, ease: "power4.out", scrollTrigger: { trigger: el, start: "top 85%" } }));
      gsap.to(".marquee-inner", { xPercent: -50, duration: 30, ease: "none", repeat: -1 });
    }, root);
    requestAnimationFrame(() => ScrollTrigger.refresh());
    document.fonts?.ready.then(() => ScrollTrigger.refresh());
    return () => ctx.revert();
  }, [reduced, loaded]);

  // spotlight on cards
  const spot = (e: React.PointerEvent<HTMLElement>) => {
    const r = e.currentTarget.getBoundingClientRect();
    e.currentTarget.style.setProperty("--mx", `${e.clientX - r.left}px`);
    e.currentTarget.style.setProperty("--my", `${e.clientY - r.top}px`);
  };

  const manifesto = "Healthcare information systems, school management APIs, ISP billing, and web products — across Konvergenze, Doros, Enatontech, Kozi Connect, and AIGOT.";
  const shown = skills.filter((s) => group === "All" || s.group === group);
  const hov = skills.find((s) => s.name === hovSkill);

  return (
    <div ref={root} className={reduced ? "reduced" : ""}>
      {!loaded && <Loader done={finishLoad} />}
      <Cursor />
      <a className="skip" href="#main">Skip to content</a>
      <header className="nav">
        <a href="#top" className="logo" aria-label="Home">JW<span>.</span></a>
        <nav aria-label="Sections">
          <a href="#work"><b>01</b> Work</a><a href="#systems"><b>02</b> Systems</a><a href="#stack"><b>03</b> Skills</a><a href="#record"><b>04</b> Education</a><a href="#ping"><b>05</b> Contact</a>
        </nav>
        <div className="nav-tools">
          <Clock />
          <button className="tool" onClick={() => setTerm(true)} title="Open terminal (Ctrl or Cmd + K)" aria-label="⌘K open terminal" data-cursor="⌘K"><kbd>⌘K</kbd></button>
          <button className="tool" onClick={toggleSound} aria-pressed={snd} title="Toggle sound">{snd ? "♪ on" : "♪ off"}</button>
          <button className="tool" onClick={toggleTheme} title={`Switch to ${light ? "dark" : "light"} theme`}>{light ? "◐ dark" : "◑ light"}</button>
        </div>
      </header>

      <main id="main">
        <section className="hero" id="top" aria-labelledby="hero-name">
          <div className="hero-bg" aria-hidden="true">
            {show3d ? <Suspense fallback={null}><Hero3D light={light} /></Suspense> : <div className="hero-static" />}
          </div>
          <div className="hero-grid" aria-hidden="true" />
          <div className="hero-inner">
            <p className="kicker hero-fade">Fullstack Software Developer · Computer Science</p>
            <h1 id="hero-name" className="hero-title">
              <Split text="WACHIYE" className="hero-w" />
              <span className="hero-sub"><Split text="Jeremiah Siranjofu" /></span>
            </h1>
            <p className="hero-lede hero-fade">Fullstack Software Developer at Konvergenze Network Solutions on <strong>TaifaCare HMIS</strong>, implementing healthcare interoperability with <em>FHIR, SHR and HIE</em>.</p>
            <div className="hero-cta hero-fade">
              <Magnetic href={`mailto:${contact.email}`} className="btn primary" data-cursor="say hi">Email <span aria-hidden="true">↗</span></Magnetic>
              <Magnetic href="#work" className="btn">Experience <span aria-hidden="true">↓</span></Magnetic>
              <Magnetic onClick={() => setTerm(true)} className="btn ghost">&gt;_ terminal</Magnetic>
            </div>
          </div>
          <dl className="hero-stats hero-fade">
            <div><dt>Mar 2022 – present</dt><dd>6 roles</dd></div>
            <div><dt>Egerton University</dt><dd>2nd Upper</dd></div>
            <div><dt>Kozi Connect, 2023</dt><dd>Best Solutions Architect</dd></div>
            <div><dt>Now</dt><dd>TaifaCare HMIS</dd></div>
          </dl>
        </section>

        <div className="marquee" aria-hidden="true"><div className="marquee-inner">{[...ticker, ...ticker, ...ticker, ...ticker].map((t, i) => <span key={i}>{t}<i>✶</i></span>)}</div></div>

        <section className="manifesto" aria-label="About">
          <p>{manifesto.split(" ").map((w, i) => <span className="w" key={i}>{w} </span>)}</p>
        </section>

        <section className="work" id="work" aria-labelledby="work-h">
          <div className="work-head">
            <div className="work-sticky">
              <p className="kicker">01 / Experience</p>
              <h2 id="work-h" className="big-type"><Split text="Experience" /></h2>
              <p className="muted">Mar 2022 – present · 6 roles</p>
              <ol className="role-index" aria-label="Roles">
                {jobs.map((j, i) => (
                  <li key={i}><button aria-current={activeJob === i ? "step" : undefined} onClick={() => jumpTo(i)}>
                    <b>{String(i + 1).padStart(2, "0")}</b><span>{j.org}</span><i aria-hidden="true" /></button></li>
                ))}
              </ol>
            </div>
          </div>
          <ol className="job-list">
            {jobs.map((j, i) => (
              <li key={j.org + j.role} id={`job-${i}`} className="job" data-active={activeJob === i || undefined} onPointerMove={spot}>
                <div className="job-num" aria-hidden="true">{String(i + 1).padStart(2, "0")}</div>
                <p className="job-date">{j.start} — {j.end}</p>
                <h3>{j.role}</h3>
                <p className="job-org">{j.org}</p>
                <ul>{j.points.map((p) => <li key={p}>{p}</li>)}</ul>
                <p className="tags">{j.skills.map((s) => <span key={s}>{s}</span>)}</p>
              </li>
            ))}
          </ol>
        </section>

        <section className="systems" id="systems" aria-labelledby="sys-h">
          <p className="kicker">02 / Systems</p>
          <h2 id="sys-h" className="big-type"><Split text="Systems built" /></h2>
          <ul className="sys-grid">
            {systems.map((s, i) => (
              <li key={s.name} className="sys reveal" onPointerMove={spot} data-hot>
                <span className="sys-i" aria-hidden="true">{String(i + 1).padStart(2, "0")}</span>
                <h3>{s.name}</h3>
                <p className="sys-where">{s.where}</p>
                <p>{s.note}</p>
              </li>
            ))}
          </ul>
        </section>

        <section className="stack" id="stack" aria-labelledby="stack-h">
          <p className="kicker">03 / Skills</p>
          <h2 id="stack-h" className="big-type"><Split text="Technical skills" /></h2>
          <div className="filters" role="group" aria-label="Filter skills">
            {(["All", ...skillGroups] as const).map((g) => (
              <button key={g} aria-pressed={group === g} onClick={() => { setGroup(g); sound.blip(700, 0.03); }}>{g}</button>
            ))}
          </div>
          <div className="stack-wrap">
            <ul className="chips">
              {shown.map((s) => (
                <li key={s.name}><button onMouseEnter={() => setHovSkill(s.name)} onFocus={() => setHovSkill(s.name)} aria-describedby="skill-where">{s.name}</button></li>
              ))}
            </ul>
            <aside className="where" id="skill-where" aria-live="polite">
              <p className="kicker">Used at</p>
              <h3>{(hov ?? shown[0])?.name}</h3>
              <p>{(hov ?? shown[0])?.where}</p>
            </aside>
          </div>
        </section>

        <section className="record" id="record" aria-labelledby="rec-h">
          <p className="kicker">04 / Education</p>
          <h2 id="rec-h" className="big-type"><Split text="Education & awards" /></h2>
          <div className="rec-grid">
            {education.map((e) => (
              <article key={e.school} className="edu reveal">
                <p className="job-date">{e.start} — {e.end}</p>
                <h3>{e.program}</h3>
                <p className="job-org">{e.school}</p>
                <ul>{e.points.map((p) => <li key={p}>{p}</li>)}</ul>
              </article>
            ))}
          </div>
          <ol className="awards">
            {awards.map((a) => (
              <li key={a.title} className="reveal"><time>{a.when}</time><strong>{a.title}</strong><span>{a.detail}</span></li>
            ))}
          </ol>
        </section>

        <section className="ping" id="ping" aria-labelledby="ping-h">
          <p className="kicker">05 / Contact</p>
          <h2 id="ping-h" className="big-type ping-h"><Split text="Contact" /></h2>
          <div className="ping-cta">
            <Magnetic href={`mailto:${contact.email}`} className="btn primary huge" data-cursor="send">{contact.email}</Magnetic>
          </div>
          <ul className="links">
            <li><a href={contact.phoneHref}>{contact.phoneDisplay}</a></li>
            <li><a href={contact.github} target="_blank" rel="noreferrer">GitHub ↗</a></li>
            <li><a href={contact.linkedin} target="_blank" rel="noreferrer">LinkedIn ↗</a></li>
            <li><a href={contact.site} target="_blank" rel="noreferrer">wachiye.github.io ↗</a></li>
            <li><button className="linkbtn" onClick={print}>Résumé (print / PDF) ⎙</button></li>
          </ul>
        </section>
      </main>

      <footer className="footer"><span>© {new Date().getFullYear()} {contact.name}</span><a href="#top">Back to top ↑</a></footer>

      {/* print-only résumé */}
      <article className="print-resume" aria-hidden="true">
        <h1>{contact.name}</h1>
        <p>{contact.email} · {contact.phoneDisplay} · {contact.github} · {contact.linkedin} · {contact.site}</p>
        <h2>Experience</h2>
        {jobs.map((j) => <div key={j.org + j.role}><h3>{j.role} — {j.org} <small>{j.start} – {j.end}</small></h3><ul>{j.points.map((p) => <li key={p}>{p}</li>)}</ul></div>)}
        <h2>Education</h2>
        {education.map((e) => <div key={e.school}><h3>{e.program} — {e.school} <small>{e.start} – {e.end}</small></h3><ul>{e.points.map((p) => <li key={p}>{p}</li>)}</ul></div>)}
        <h2>Awards &amp; certificates</h2>
        <ul>{awards.map((a) => <li key={a.title}>{a.when}: {a.title} — {a.detail}</li>)}</ul>
        <h2>Skills</h2>
        <p>{skills.map((s) => s.name).join(", ")}</p>
      </article>

      <Terminal open={term} onClose={() => setTerm(false)} actions={{ theme: toggleTheme, sound: toggleSound, print }} />
    </div>
  );
}
