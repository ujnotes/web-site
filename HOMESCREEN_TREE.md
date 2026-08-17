# Homepage tree rules

These rules govern the hierarchy shown on the Ujnotes homepage. Apply them generically from the component data; do not special-case an article merely to make one branch look correct.

## Ordering and layout

- Sort siblings alphabetically by their trimmed, localized display label.
- Keep childless siblings in the same row whenever space permits. Tiles must wrap naturally onto the next row when the available width is exhausted.
- A branch must use the full available homepage content width; it must not shrink-wrap around its first tiles. This applies to the Computer tree and every other top-level branch.
- Encountering a sibling with children must not force unrelated childless siblings out of the current row. The parent may remain beside its siblings when space permits.
- Render a node's direct children one level below it. Children must always be visually displaced to the right of their parent.
- After a node's descendants have been rendered, continue with the parent's remaining siblings in the next available row.
- Apply the same recursive rules at every depth, including the children of Philosophy's child nodes.

## Connectors

- Use the left-connector pattern for a node on the left-hand tree spine, as between World and Philosophy: start from the line to the left of the parent tile and connect each direct child from that line.
- Use the bottom-connector pattern for a node encountered after that left-hand spine in a sibling row, as between Game and Doom: start below the parent tile's bottom center with a small gap, then turn toward its children on the right.
- A parent's vertical connector starts at the vertical center of the corresponding parent tile only for a left-connected child level.
- The vertical connector ends at the center of the parent's last direct child in the immediately lower level. It must never continue through grandchildren or deeper descendants.
- When a direct-child tile group wraps onto multiple rows, replace the per-tile elbows with one group connector terminating at the midpoint of the group spine.
- Place the vertical group spine 24 px to the left of the wrapped group, extending from the center of its first row to the center of its last row. The parent connector meets the midpoint of this spine.
- Connect the spine to the leftmost tile in every wrapped row with a short horizontal segment that stops 8 px before the tile.
- Detect connector conflicts from the final rendered layout after wrapping and on every resize. Treat only a connector crossing through the interior of another connector, or a connector passing beneath a tile owned by another group, as a conflict. Shared endpoints and intentional parent-child junctions are connections, not conflicts.
- For each conflict, keep one complete connector in the normal 1 px muted solid style and render the other complete connector in the 2 px high-contrast dashed alternate style. Apply one style end-to-end to its vertical, elbow, group spine, and every row segment; never mix styles within one connector path.
- Horizontal and vertical connector sections must meet cleanly; overlap their strokes by one pixel where necessary to avoid a visible seam.
- Leave a small gap between a connector and the edge of a tile.
- When a child is placed below its parent, as with Game and Doom, start the connector below the center of the parent's bottom edge with a small gap, then connect toward the child. The child must still be displaced to the right.
- Recalculate connector geometry after initial rendering, viewport resizing, wrapping, and expanding or collapsing a branch.

## Expand and collapse controls

- Show a minus glyph for an expanded node and a plus glyph for a collapsed node.
- Draw connector strokes beneath the tile layer; connector lines must never paint over a tile.
- Place a bottom connector's plus/minus control immediately below the parent tile after the small bottom gap, at the start of the vertical segment.
- Leave visual space between the glyph and its connector. A page-colored disc behind the glyph may create this break in the line.
- Give each glyph a larger invisible circular hit target (currently 32 px) without making the visible glyph disproportionately large.
- Preserve the control's legibility and line break in both light and dark themes.

## Data and maintenance

- Derive the tree recursively from the homepage component hierarchy, including eligible localized descendants, instead of hardcoding individual article tiles.
- Preserve intentional external destinations in branches that contain them.
- Keep connector calculation and hierarchy behavior shared across branches. A fix for one branch must not regress or bypass the generic behavior used by the others.
