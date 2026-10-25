# wachiye.vercel.app

Personal website of **Jeremiah Siranjofu Wachiye**, Fullstack Software Developer (Computer Science, Egerton University).

Live: https://wachiye.vercel.app

## Content
All content comes from the résumé and lives in `src/profile.ts`: experience (Konvergenze Network Solutions, Doros Ltd, Enatontech, Kozi Connect Ltd, AIGOT SRL), systems built, technical skills, education, and awards.

## Stack
- Vite, React 19, TypeScript
- Three.js: hero node constellation, lazy-loaded
- GSAP + ScrollTrigger, Lenis smooth scroll
- Plain CSS with dark/light themes, `prefers-reduced-motion` static fallback, and a print stylesheet for the résumé

## Local development
```bash
npm ci
npm run dev      # http://localhost:5173
npm run build    # static output in dist/
npm run preview
```

## Deploy
Static site on Vercel (project `wachiye`):
```bash
npm run build
cd dist && vercel deploy --prod
```
