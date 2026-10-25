let ctx: AudioContext | null = null;
let on = false;
export const sound = {
  get on() { return on; },
  toggle() { on = !on; if (on && !ctx) ctx = new AudioContext(); if (on) this.blip(880, 0.08); return on; },
  blip(freq = 660, dur = 0.04, vol = 0.04) {
    if (!on || !ctx) return;
    const o = ctx.createOscillator(), g = ctx.createGain();
    o.type = "triangle"; o.frequency.value = freq;
    g.gain.setValueAtTime(vol, ctx.currentTime);
    g.gain.exponentialRampToValueAtTime(0.0001, ctx.currentTime + dur);
    o.connect(g).connect(ctx.destination); o.start(); o.stop(ctx.currentTime + dur);
  },
};
