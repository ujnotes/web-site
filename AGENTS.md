# Project instructions

For any work that creates, changes, debugs, or reviews the homepage hierarchy, read and follow [HOMESCREEN_TREE.md](HOMESCREEN_TREE.md) in full before making changes.

The homepage tree specification applies recursively to every branch and takes precedence over incidental layout produced by older branch-specific markup.

## Path casing

- Operational dirs stay lowercase (`root`, `interim`, `public`, `config`). Public-facing topic names stay capitalized (`World`, `Philosophy`, `Life`). See `H:\AGENTS.md` section "Path casing".
- `interim` and `public` are entirely lowercase.

## Local vs production

- `ujnotes.local` renders live PHP from `root/`. `ujnotes.com` serves baked HTML from `web-public`. Listing tiles stay on `/resource/placeholder.svg` until the parent listing is republished; publishing only the child article is not enough.
- Never edit `web-public` / GitHub raw HTML by hand (no search-replace on `build/public/*.html`). Production files are minify output. Always render into `interim`, let Tiggu minify into `public`, then publish that. If a tile or script src is wrong, fix source or rerun Tiggu, then publish.

- Homepage is slug `root` and bakes to `public/index.html`. It is not a Notion-queued article. Do not run `publish-notion.ps1 -Slug root` (that overwrites `Root.php` tree markup). Isolated child publishes do not rebuild homepage tiles.
- Rebuild the homepage with Tiggu: write a temporary `Config/Render.lsv` containing only `root`, delete stale `public/index.html` first (Tiggu `check()` ignores Resource/Url.tsv cover changes), `docker compose -p ujnotes exec web-site /app/tiggu/build.sh /app/site/project`, copy `public/index.html` into `web-public`, commit, and push. Delete `Render.lsv` afterwards. Do not commit it.

- See `H:\AGENTS.md` sections "Local vs production HTML" and "Publisher encoding (Windows)", and `H:\Website\AGENTS.md` section "Notion subtree publication".
