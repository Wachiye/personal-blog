import { useEffect, useRef, useState } from "react";
import { contact, jobs, skills, education, awards } from "./profile";

type Line = { t: string; c?: string };
const HELP = ["help", "whoami", "cat resume", "ls jobs", "skills", "education", "awards", "contact", "goto <work|systems|stack|record|ping>", "theme", "sound", "print", "clear", "exit"];

export default function Terminal({ open, onClose, actions }: { open: boolean; onClose: () => void; actions: { theme: () => void; sound: () => boolean; print: () => void } }) {
  const [lines, setLines] = useState<Line[]>([{ t: "Jeremiah Siranjofu Wachiye — Fullstack Software Developer", c: "dim" }]);
  const [val, setVal] = useState("");
  const [hist, setHist] = useState<string[]>([]);
  const [hi, setHi] = useState(-1);
  const input = useRef<HTMLInputElement>(null);
  const body = useRef<HTMLDivElement>(null);
  useEffect(() => { if (open) setTimeout(() => input.current?.focus(), 30); }, [open]);
  useEffect(() => { body.current?.scrollTo(0, 1e6); }, [lines]);

  const out = (arr: (string | Line)[]) => setLines((l) => [...l, ...arr.map((x) => (typeof x === "string" ? { t: x } : x))]);
  const run = (raw: string) => {
    const cmd = raw.trim().toLowerCase();
    out([{ t: `guest@wachiye:~$ ${raw}`, c: "cmd" }]);
    if (!cmd) return;
    setHist((h) => [raw, ...h]); setHi(-1);
    const [head, arg] = cmd.split(/\s+/);
    switch (head) {
      case "help": out(HELP.map((h) => `  ${h}`)); break;
      case "whoami": out([contact.name, "Fullstack Software Developer · Computer Science, Egerton University", "Konvergenze Network Solutions — TaifaCare HMIS (Nov 2024 – Present)"]); break;
      case "cat":
        if (arg === "resume" || arg === "resume.txt")
          out([`# ${contact.name}`, "", ...jobs.flatMap((j) => [`## ${j.role} | ${j.org} (${j.start} – ${j.end})`, ...j.points.map((p) => `  - ${p}`), ""]), ...education.map((e) => `## ${e.program} | ${e.school} (${e.start} – ${e.end})`)]);
        else out([{ t: `cat: ${arg ?? ""}: No such file`, c: "err" }]);
        break;
      case "ls": out(jobs.map((j, i) => `  ${String(i + 1).padStart(2, "0")}  ${j.start.padEnd(9)} ${j.org} — ${j.role}`)); break;
      case "skills": out([skills.map((s) => s.name).join(" · ")]); break;
      case "education": out(education.map((e) => `${e.program} — ${e.school} (${e.start} – ${e.end})`)); break;
      case "awards": out(awards.map((a) => `${a.when}  ${a.title} — ${a.detail}`)); break;
      case "contact": out([`email    ${contact.email}`, `phone    ${contact.phoneDisplay}`, `github   ${contact.github}`, `linkedin ${contact.linkedin}`, `web      ${contact.site}`]); break;
      case "goto": {
        const el = document.getElementById(arg ?? "");
        if (el) { onClose(); el.scrollIntoView({ behavior: "smooth" }); } else out([{ t: "goto: unknown section", c: "err" }]);
        break;
      }
      case "theme": actions.theme(); out(["theme toggled"]); break;
      case "sound": out([`sound ${actions.sound() ? "on" : "off"}`]); break;
      case "print": onClose(); setTimeout(actions.print, 100); break;
            case "clear": setLines([]); break;
      case "exit": onClose(); break;
      default: out([{ t: `${head}: command not found`, c: "err" }]);
    }
  };

  if (!open) return null;
  return (
    <div className="term-backdrop" onMouseDown={(e) => e.target === e.currentTarget && onClose()}>
      <div className="term" role="dialog" aria-modal="true" aria-label="Terminal">
        <div className="term-bar"><span /><span /><span /><b>guest@wachiye: ~</b><button onClick={onClose} aria-label="Close terminal">esc</button></div>
        <div className="term-body" ref={body} aria-live="polite">
          {lines.map((l, i) => <pre key={i} className={l.c}>{l.t}</pre>)}
          <form onSubmit={(e) => { e.preventDefault(); run(val); setVal(""); }} className="term-in">
            <label htmlFor="term-input">guest@wachiye:~$</label>
            <input id="term-input" ref={input} value={val} autoComplete="off" spellCheck={false}
              onChange={(e) => setVal(e.target.value)}
              onKeyDown={(e) => {
                if (e.key === "Escape") onClose();
                if (e.key === "ArrowUp" && hist.length) { const n = Math.min(hi + 1, hist.length - 1); setHi(n); setVal(hist[n]); e.preventDefault(); }
                if (e.key === "ArrowDown") { const n = hi - 1; setHi(n); setVal(n < 0 ? "" : hist[n]); e.preventDefault(); }
                if (e.key === "Tab") { e.preventDefault(); const m = HELP.find((h) => h.startsWith(val)); if (m && val) setVal(m.split(" <")[0]); }
              }} />
          </form>
        </div>
      </div>
    </div>
  );
}
