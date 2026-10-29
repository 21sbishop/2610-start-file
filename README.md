# 2610 Start File — Discover Orem

A responsive, SCSS-powered landing page for DWDD 2610, themed around Orem, UT
and built from the project's Figma design library (colors, grey scale, Work
Sans type, and a twin-peak "Mt. Timpanogos" logo mark).

## 1. Set up Live Sass Compiler

1. In VS Code, install the **Live Sass Compile** extension (by Glenn
   Marks / ritwickdey).
2. This folder already has `.vscode/settings.json` configured so the
   extension outputs **expanded** and **minified** CSS into `/styles`,
   relative to `scss/styles.scss`:
   ```json
   "liveSassCompile.settings.formats": [
     { "format": "expanded", "extensionName": ".css", "savePath": "/styles" },
     { "format": "compressed", "extensionName": ".min.css", "savePath": "/styles" }
   ]
   ```
3. Open `scss/styles.scss` and click **"Watch Sass"** in the VS Code status
   bar. Every save to any partial (`_normalize.scss`, `_variables.scss`,
   `_small.scss`, `_large.scss`) recompiles `styles/styles.css` and
   `styles/styles.min.css`.
4. `index.html` already links the compiled, minified file
   (`styles/styles.min.css`) — the compiled CSS in this folder was
   pre-built with the Sass CLI so the page works immediately, before you
   even open VS Code.

You'll see a **deprecation warning about `@import`** when it compiles —
that's expected. `@import` still works fine and is what Live Sass Compiler
supports out of the box; it's just being phased out of the Sass language
long-term.

## 2. Project structure

```
2610-start-file/
├── index.html
├── favicon.ico
├── site.webmanifest
├── img/
│   ├── logo.svg          ← city mark used in the header/footer
│   ├── hero.svg           ← illustrated hero background
│   ├── og-image.png       ← social share preview
│   └── favicon-*.png, apple-touch-icon.png, android-chrome-*.png
├── js/
│   └── script.js          ← dynamic footer year (loaded with `defer`)
├── scss/
│   ├── styles.scss        ← entry point — only this one gets watched
│   ├── _normalize.scss
│   ├── _variables.scss    ← colors, type, spacing — straight from Figma
│   ├── _small.scss        ← mobile-first base styles (320px+)
│   └── _large.scss        ← media queries (768 / 1024 / 1440px+)
└── styles/
    ├── styles.css          ← expanded output
    ├── styles.min.css      ← minified output (what index.html loads)
    └── styles.css.map
```

## 3. Design-principle notes (for your write-up)

- **Contrast** — the gold CTA button against the dark hero scrim; large
  bold headings against smaller muted body text.
- **Proximity** — each card groups its icon/title/text tightly, while
  whole sections are separated by much larger spacing.
- **Alignment** — every section shares the same `.container` max-width
  and padding, so content edges line up down the page.
- **Hierarchy** — a clear type scale (h1 → h2 → h3 → body → caption) and
  consistent weight/color rules.
- **Way-finding** — the nav links jump to in-page sections and the
  current section gets a gold underline (`.is-current`).
- **Visual tangent** — see the comment above `.container` in
  `_small.scss`: the hero text, card grid, and "visit" panel all share
  the exact same left/right edges on purpose, so the page reads as one
  aligned column.

## 4. Before you submit — testing checklist

Run these yourself (they need a live URL or the W3C upload option):

- [ ] **HTML5**: [validator.w3.org](https://validator.w3.org/) — paste
      your GitHub Pages URL or upload `index.html` directly.
- [ ] **CSS3**: [jigsaw.w3.org/css-validator](https://jigsaw.w3.org/css-validator/)
      — point it at `styles/styles.css` (the expanded file is easier to
      read errors in than the minified one).
- [ ] **Accessibility**: [wave.webaim.org](https://wave.webaim.org/) — 0
      contrast errors. If something flags, check it against
      `_variables.scss` first — most text already meets AA contrast.
- [ ] **Favicon**: [realfavicongenerator.net/favicon_checker](https://realfavicongenerator.net/favicon_checker)
      — `favicon.ico`, the PNG sizes, and `site.webmanifest` are already
      wired up in `<head>`.
- [ ] **Open Graph**: [orcascan.com/tools/open-graph-validator](https://orcascan.com/tools/open-graph-validator)
      — update the `og:url` meta tag in `index.html` to your real GitHub
      Pages URL first, or it'll flag a broken link.
- [ ] **Page weight**: everything in this repo (excluding `node_modules`,
      which you should never commit) is well under 500KB — the biggest
      single files are the two favicon PNGs and the OG image, none over
      ~18KB.
- [ ] **Responsive check**: resize from 320px to 1600px — no horizontal
      scrollbar should appear at any width (already verified during
      the build).

## 5. Hosting on GitHub Pages

1. Make sure this folder is named exactly `2610-start-file` (all
   lowercase) — it already is.
2. Create a **public** GitHub repository and push this folder's contents
   to it:
   ```bash
   cd 2610-start-file
   git init
   git add .
   git commit -m "Initial commit — 2610 start file"
   git branch -M main
   git remote add origin https://github.com/<your-username>/2610-start-file.git
   git push -u origin main
   ```
3. In the repo on GitHub: **Settings → Pages → Build and deployment →
   Source: Deploy from a branch**, branch `main`, folder `/ (root)`.
   Save.
4. Your site will be live in a minute or two at:
   `https://<your-username>.github.io/2610-start-file/`
5. Update the `og:url` meta tag in `index.html` to that real URL, commit
   and push again before you run the Open Graph test.
6. Submit that GitHub Pages link.
