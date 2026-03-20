# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project

Kadence WordPress child theme **Betonnye Raboty** for a concrete works company in Lugansk. Goal: pixel-perfect 1:1 visual match with the original site at `betonnye-raboty-lugansk.ru`.

## Development Workflow

### Preview server (static HTML)
```bash
# From kadence-child directory
python3 -m http.server 8888
```
Preview available at: `http://localhost:8888/preview.html`
Original reference: `https://betonnye-raboty-lugansk.ru`

### Visual testing (pixel-perfect comparison)
```bash
# Install dependencies (once)
npm install

# Capture screenshots of all sections (original site + local preview)
node capture-all-sections.js

# Capture a single section
node capture-all-sections.js hero

# Capture only preview (skip re-fetching original — use for CSS tweaks)
node capture-all-sections.js --preview-only
node capture-all-sections.js --preview-only services

# Compare all sections (outputs mismatch % table)
node compare-all.js
```
Viewport: 1280×800. Threshold: 0.1. Target: <5% mismatch per section.
Diff images saved to `.claude/visual/snapshots/diff/`.

**Important**: Re-capturing originals introduces rendering variance (lazy-load timing, animation frames). Use `--preview-only` when iterating on CSS fixes to compare against a stable baseline.

**Portfolio caveat**: The portfolio section uses a Swiper slider — the visible slides change between captures, causing high mismatch variance. Portfolio % is unreliable across separate capture runs.

### Pixel analysis scripts (ad-hoc)
```bash
# Measure section heights/padding at 1280px viewport (both sites)
node measure-compare.js

# Deep sub-element measurements (quiz, FAQ, consultation)
node measure-quiz-faq.js

# Text position diff analysis — shows exact dx/dy shifts per text element
node pixel-diff-analysis.js
```

### CSS sync rule — CRITICAL
Every CSS change must be made in **three places simultaneously**:
1. `preview.html` — inline `<style>` block (development preview)
2. `assets/css/main.css` — WordPress theme stylesheet (production)
3. GitHub Pages deploy (`/tmp/betonnye-deploy/`) — if preview is live (deploy folder is in `/tmp`, may need re-cloning: `cd /tmp && git clone https://github.com/kpackk/betonnye-raboty-preview.git betonnye-deploy`)

If HTML structure changes in a section, also update the corresponding `template-parts/section-*.php`.
Header HTML/styles also require updating `header.php`.

**Deploy sync hazard**: The deploy repo (`/tmp/betonnye-deploy/`) has its own git history independent of the source repo. Using `git checkout HEAD~N` in the deploy repo reverts to a *deploy-specific* state, not the source's state — this can leave stale CSS (e.g., old 640px breakpoints) that doesn't exist in the source. When reverting deploy CSS, copy from the source file (`preview.html` or `main.css`) rather than using git revert. Also verify after push: multiple Claude Code sessions may push to the same deploy repo concurrently.

### GitHub Pages preview deploy
Static preview is deployed at `https://kpackk.github.io/betonnye-raboty-preview/`.
Deploy folder: `/tmp/betonnye-deploy/` (contains `index.html` + `assets/`).
All image URLs in `index.html` use local relative paths (`assets/img/...`, `assets/images/...`).
```bash
# After editing index.html or assets in /tmp/betonnye-deploy:
cd /tmp/betonnye-deploy && git add -A && git commit -m "description" && git push origin master
```
GitHub Pages builds automatically; takes ~30s. Verify: `gh api repos/kpackk/betonnye-raboty-preview/pages/builds --jq '.[0].status'`

### Client delivery
```bash
# Build clean zip (excludes node_modules, dev scripts, preview.html, CLAUDE.md)
cd kadence-child && zip -r ~/Desktop/betonnye-raboty-theme.zip . \
  -x "node_modules/*" "package*.json" ".claude/*" ".git/*" \
  -x "check-*.js" "measure-*.js" "compare-*.js" "capture-*.js" \
  -x "analyze-*.js" "inspect-*.js" "verify-*.js" "find-*.js" \
  -x "extract-*.js" "get-*.js" "deep-*.js" "detail-*.js" \
  -x "orig-*.js" "pixel-*.js" "preview.html" "CLAUDE.md"
```

## Architecture

### Page assembly
`front-page.php` includes all sections via `get_template_part()` in order:
hero → quiz → about → services → guarantees → portfolio → team → faq → consultation → price-table → modals (via `template-parts/`)

Additional page templates: `page-about.php`, `page-contacts.php`, `page-privacy-policy.php`.

### CSS enqueue order (functions.php)
Parent kadence → Google Fonts (Manrope + Inter) → Swiper v11 CDN → `assets/css/main.css` → `style.css`

### CSS design tokens (in `:root`)
| Token | Value |
|-------|-------|
| `--color-primary` | `#A34100` |
| `--color-dark-bg` | `#1a1a1a` |
| `--header-height` | `92px` |
| `--container-width` | `1046px` |
| `--font-heading` | Manrope |
| `--font-body` | Manrope |

Inter is used directly (not via variable) in specific elements: header phone link, consultation schedule/form inputs.

Header: `position: fixed`, transparent background (hero shows through), gains `background: rgba(26,26,26,0.95)` on `.scrolled` class (added via JS at scroll > 50px). Header font sizes are very small (9.33–13.33px range) to match the original.

### JS files (all loaded in footer)
- `main.js` — header scroll effect (hide on scroll down, show on scroll up), smooth scroll, cookie banner, mobile menu, Swiper portfolio slider
- `quiz.js` — multi-step quiz with progress bar (4 steps), messenger selection
- `faq.js` — accordion (single-open behavior)
- `modals.js` — open/close modals (triggered by `data-modal` attribute), exit intent modal on mouseout
- `forms.js` — AJAX form submission → `betonnye_handle_form_submission` action

### AJAX forms
`wp_localize_script` exposes `betonnye_ajax.url` and `betonnye_ajax.nonce` to JS. Forms POST to `admin-ajax.php` with action `betonnye_submit_form`. Handler in `inc/ajax-handlers.php` sanitizes, validates, sends email to `admin_email`. Phone validation: 7+ digits after stripping non-numeric chars.

### Portfolio CPT
`inc/cpt-portfolio.php` registers `portfolio` post type (no public archive, used for admin). The front-page portfolio section renders a Swiper slider with fallback to 11 static images when no CPT posts exist.

### Logo
Desktop: `.header-logo img { height: 75.5px }`. Mobile (768px): `height: 20vw`, scrolled: `15vw`. No inline styles on the `<img>` tag — CSS handles all responsive sizing.

### Modals
7 modals defined in `template-parts/modals.php`: price download, callback, exit intent, promotion, service request, surveyor, consultation. Triggered via `data-modal="modal-id"` on any element. All forms validate phone + privacy checkbox before AJAX submit.

### Image assets
- `assets/img/` — main images (logo, hero-bg, about-photo, manager, quiz icons, CSS background images, SVG icons)
- `assets/img/services/` — 8 service card photos
- `assets/img/portfolio/` — 11 portfolio fallback photos
- `assets/img/team/` — 4 team member photos
- `assets/images/` — guarantees section (galochka.png, dogovor.png, 122.png, consultation-bg.jpg)

All images are local — no external URL dependencies.

### Section selector mapping (for visual testing scripts)
| Section | Original site selector | Preview selector |
|---------|----------------------|-----------------|
| hero | `.header` (first viewport) | `.section-hero, #hero` |
| quiz | `#quiz` | `#quiz` |
| about | `#about-company` | `.section-about, #about` |
| services | `#services` | `.section-services, #services` |
| guarantees | `#warranty` | `.section-guarantees, #guarantees` |
| portfolio | `#process` | `.section-portfolio, #portfolio` |
| team | `#reasons` | `.section-team, #team` |
| faq | `#faq` | `.section-faq, #faq` |
| consultation | `#getconsultation` | `.section-consultation, #consultation` |

### Current visual test baseline (March 2026)
| Section | Mismatch | Height match |
|---------|----------|--------------|
| hero | ~4.0% | 800=800 |
| quiz | ~4.1% | 569=569 |
| about | ~3.6% | 851≈852 |
| services | ~2.8% | 985=985 |
| guarantees | ~3.0% | 477=477 |
| portfolio | ~2.3% | 959=959 |
| team | ~2.4% | 1563≈1569 |
| faq | ~3.7% | 951≈958 |
| consultation | ~4.1% | 561=561 |

Remaining mismatches are from font sub-pixel rendering, lazy-load image timing, and structural differences between Kadence blocks (original) vs static HTML (preview).

### Mobile responsive strategy
The original site uses **vw units** for all mobile sizing (single breakpoint at 768px). Our theme mirrors this approach:
- Responsive breakpoints: 1200px → 992px → 768px → 480px (no 640px breakpoint)
- At 768px: all font sizes, paddings, and gaps switch to vw units (e.g., hero title `7.5vw`, section titles `6.25vw`, CTA button `76.875vw` wide)
- No separate 360px breakpoint — vw units scale fluidly
- `html { overflow-x: hidden }` prevents horizontal scroll from any stray elements
- Header on mobile: `--header-height: 25vw`, shows phone number + "ЗАКАЗ ЗВОНКА", hamburger menu hidden
- Inline `style="font-size: ..."` on HTML elements will override responsive CSS — avoid them, use CSS classes instead

**Header font pitfall**: Header desktop font sizes are tiny (9.33px tagline, 10.67px address) to match the original. At 1200px, `.header-tagline` is hidden via `display: none`. At 768px it's re-shown with `display: block; order: 3; width: 100%`. **Do not increase header font-size on mobile** — even small vw values (e.g., 3.6vw = 13.5px at 375px) compound with `width: 100%` layout and push content into the hero section. Keep the original 9.33px and adjust only gap/margin. The +1px body text bump uses `+0.25vw` for vw-based values.

**No main repo remote**: This git repo has no configured remote (`git remote -v` returns empty). `git push` will fail. Only the deploy repo at `/tmp/betonnye-deploy/` has a remote (GitHub).

**Common mobile overflow sources** (must have proper mobile overrides):
- `.team-layout` (grid 457px + 1fr) → single column on mobile
- `.team-card img` (width: 585px) → `width: 100%` on mobile
- `.consultation-inner` (flex, fixed widths) → `flex-direction: column` on mobile
- `.consultation-box` (padding: 85px left) → symmetric `6vw 4vw` on mobile
- `.price-table` → wrapped in `overflow-x: auto` container

### CSS sections in main.css (24 sections + late overrides)
Design Tokens → Reset → Typography → Header → Hero → Quiz → About → Services → Guarantees → Portfolio → Team → FAQ → Consultation → Price Table → Footer → Modals → Buttons → Cookie Banner → Inner Pages → Utility → Responsive 1200px → 992px → 768px → 480px

**Late-defined rules**: Some component styles (`.about-heading`, `.consultation-label`, etc.) are defined after the responsive blocks. A final `@media (max-width: 768px)` block at the end of the stylesheet overrides these for mobile. When adding new component styles, ensure responsive overrides come AFTER the component definition in cascade order.
