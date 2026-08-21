param(
    [ValidateSet('Edit', 'Web')]
    [string]$Mode = 'Web',

    [Parameter(Mandatory)]
    [string]$Path,

    [string]$CssPath
)

$ErrorActionPreference = 'Stop'

$resolvedPath = [IO.Path]::GetFullPath($Path)
if (-not [IO.File]::Exists($resolvedPath)) {
    throw "SVG not found: $resolvedPath"
}

$text = [IO.File]::ReadAllText($resolvedPath)
$crlf = [string][char]13 + [char]10
$lf = [string][char]10
$newline = if ($text.Contains($crlf)) { $crlf } else { $lf }
$startMarker = '/* UJNOTES_BROWSER_DARK_MODE_START */'
$endMarker = '/* UJNOTES_BROWSER_DARK_MODE_END */'
$markedBlockPattern = '(?ms)^\s*/\* UJNOTES_BROWSER_DARK_MODE_START \*/.*?^\s*/\* UJNOTES_BROWSER_DARK_MODE_END \*/\r?\n?'

if ($Mode -eq 'Edit') {
    $updated = [regex]::Replace($text, $markedBlockPattern, '')
    if ($updated -eq $text) {
        Write-Output "Already ready for Inkscape editing: $resolvedPath"
        exit 0
    }
}
else {
    if ($text.Contains($startMarker) -or $text.Contains($endMarker)) {
        Write-Output "Browser dark mode is already present: $resolvedPath"
        exit 0
    }

    $styleCloseMatches = [regex]::Matches($text, '(?m)^\s*</style>')
    if ($styleCloseMatches.Count -ne 1) {
        throw "Expected exactly one closing </style> element; found $($styleCloseMatches.Count)"
    }

    $resolvedCssPath = if ([string]::IsNullOrWhiteSpace($CssPath)) {
        [IO.Path]::ChangeExtension($resolvedPath, '.css')
    }
    else {
        [IO.Path]::GetFullPath($CssPath)
    }
    if (-not [IO.File]::Exists($resolvedCssPath)) {
        throw "Dark-mode CSS not found: $resolvedCssPath"
    }

    $css = [IO.File]::ReadAllText($resolvedCssPath).Trim()
    if ([string]::IsNullOrWhiteSpace($css)) {
        throw "Dark-mode CSS is empty: $resolvedCssPath"
    }
    if ($css.Contains($startMarker) -or $css.Contains($endMarker)) {
        throw 'The external CSS must not contain injection markers'
    }

    $cssLines = $css.Replace($crlf, $lf).Replace([string][char]13, $lf) -split $lf
    $indentedCss = (($cssLines | ForEach-Object { '      ' + $_ }) -join $newline).TrimEnd()
    $darkCss = '      ' + $startMarker + $newline +
        $indentedCss + $newline +
        '      ' + $endMarker + $newline

    $updated = $text.Insert($styleCloseMatches[0].Index, $darkCss)
}

try {
    [xml]$updated | Out-Null
}
catch {
    throw "Refusing to write invalid SVG XML: $($_.Exception.Message)"
}

[IO.File]::WriteAllText($resolvedPath, $updated, [Text.UTF8Encoding]::new($false))

if ($Mode -eq 'Edit') {
    Write-Output "Removed browser dark mode; ready for Inkscape editing: $resolvedPath"
}
else {
    Write-Output "Injected browser dark mode from $resolvedCssPath; ready for web use: $resolvedPath"
}