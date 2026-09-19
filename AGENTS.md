# Project instructions

When something new is learned, persist it: create or update a dedicated skill under `D:\Ujnotes\Website\.cursor\skills\`, or add a short rule here / in `D:\Ujnotes\AGENTS.md` / `D:\Ujnotes\Website\AGENTS.md`. Do not leave the lesson only in chat.

For any work that creates, changes, debugs, or reviews the homepage hierarchy, read and follow [HOMESCREEN_TREE.md](HOMESCREEN_TREE.md) in full before making changes.

The homepage tree specification applies recursively to every branch and takes precedence over incidental layout produced by older branch-specific markup.

## Path casing

- Operational dirs stay lowercase (`root`, `interim`, `public`, `config`). Public-facing topic names stay capitalized (`World`, `Philosophy`, `Life`). See `D:\Ujnotes\AGENTS.md` section "Path casing".
- `interim` and `public` are entirely lowercase.

## Production deploy trigger

- `ujnotes.com` deploys when `ujnotes/web-public` `main` is pushed (Firebase Hosting GitHub Action).
- That push is manual: local `publish-notion.ps1` / `publish-notion-subtree.ps1` in `D:\Ujnotes\Website\project`, or the `Publish page from Source` `workflow_dispatch` on `ujnotes/web`.
- Notion database polling (15-minute cron) is parked. Do not restore it. The planned replacement is a URL hook / dashboard trigger.

## Local vs production

- `ujnotes.local` renders live PHP from `root/`. `interim.ujnotes.local` and `public.ujnotes.local` serve baked trees and must map canonical `/{slug}.jpg` (and `.json`) through `.htaccess` onto `/{slug}/index.*`. `ujnotes.com` does the same with Firebase rewrites. Listing tiles stay on `/resource/placeholder.svg` until the parent listing is republished; publishing only the child article is not enough.
- Never edit `web-public` / GitHub raw HTML by hand (no search-replace on `build/public/*.html`). Production files are minify output. Always render into `interim`, let Tiggu minify into `public`, then publish that. If a tile or script src is wrong, fix source or rerun Tiggu, then publish.

- Homepage is slug `root` and bakes to `public/index.html`. It is not a Notion-queued article. Do not run `publish-notion.ps1 -Slug root` (that overwrites `Root.php` tree markup). Isolated child publishes do not rebuild homepage tiles.
- Rebuild the homepage with Tiggu: write a temporary `Config/Render.lsv` containing only `root`, delete stale `public/index.html` first (Tiggu `check()` ignores Resource/Url.tsv cover changes), `docker compose -p ujnotes exec web-site /app/tiggu/build.sh /app/site/project`, copy `public/index.html` into `web-public`, commit, and push. Delete `Render.lsv` afterwards. Do not commit it.

- See `D:\Ujnotes\AGENTS.md` sections "Local vs production HTML" and "Publisher encoding (Windows)", and `D:\Ujnotes\Website\AGENTS.md` section "Notion subtree publication".
- Timeline date dashes: `root/CSS/Base/Component/Timeline.css` and Framework `CSS/Base/Component/Timeline.css` (`span.date`, `min-width:11ch`). Do not hand-edit baked HTML. Republish uses NCMS PHP plus `Protect-TimelineDates.py`; pin Framework SHA in the same change set when that CSS moves.

## Resource → URL list

**Resource → URL list:** When you add a file under `root/Resource/` that must appear in production (covers, logos, static images), also add a matching row to the site’s bake URL list (`Config/Url.tsv` / `URL.tsv`, and `Url_<lang>.tsv` when language-specific). Empty Path + Name + Extension → public `/{name}.{ext}` (usual for covers like `faq.svg`). Path `resource/` → public `/resource/{name}.{ext}`. Live PHP may work from Resource alone; baked Firebase/`web-public` only gets assets Tiggu fetches from that list. Do not hand-edit `interim/`/`public/`/`web-public` for new assets—update Resource + Url list, then bake and publish.
