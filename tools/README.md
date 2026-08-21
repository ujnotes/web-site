# SVG dark-mode workflow

Keep each SVG in the simple light-color form while editing it in Inkscape. Place its browser dark-mode CSS beside it with the same basename, such as 
`
image.svg
`
 and 
`
image.css
`
.

Before editing:

```
powershell
& .\tools\set-svg-dark-mode.ps1 -Mode Edit -Path .\path\to\image.svg
```

After editing and saving:

```
powershell
& .\tools\set-svg-dark-mode.ps1 -Mode Web -Path .\path\to\image.svg
```

`
Web
`
 derives 
`
image.css
`
 from 
`
image.svg
`
 and injects it between marked comments. 
`
Edit
`
 removes exactly that marked block. Both modes are safe to run repeatedly and validate the SVG as XML before writing it.

The PowerShell script contains no image-specific path, palette, or selector data.

Use 
`
-CssPath
`
 only when the stylesheet does not share the SVG's directory and basename.
