# Project instructions

For any work that creates, changes, debugs, or reviews the homepage hierarchy, read and follow [HOMESCREEN_TREE.md](HOMESCREEN_TREE.md) in full before making changes.

The homepage tree specification applies recursively to every branch and takes precedence over incidental layout produced by older branch-specific markup.

## Path casing

- Operational dirs stay lowercase (`root`, `interim`, `public`, `config`). Public-facing topic names stay capitalized (`World`, `Philosophy`, `Life`). See `H:\AGENTS.md` section "Path casing".
- `interim` and `public` are entirely lowercase.

## Local vs production

- `ujnotes.local` renders live PHP from `root/`. `ujnotes.com` serves baked HTML from `web-public`. Listing tiles stay on `/resource/placeholder.svg` until the parent listing is republished; publishing only the child article is not enough.
- See `H:\AGENTS.md` sections "Local vs production HTML" and "Publisher encoding (Windows)", and `H:\Website\AGENTS.md` section "Notion subtree publication".
