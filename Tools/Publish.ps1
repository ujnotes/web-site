$global:Halt = $FALSE

$iRoot = "Root\"
$oRoot = "Publish\"
$mRoot = "Interim\"

$eHost = "http://localhost"
$eMode = "Mode=Publish"

$flPath = ".\Files.tsv" 	#File List
$ilPath = ".\IDs.tsv"   	#ID List
$tlPath = ".\Template.tsv"	#Template List

$jScript = "script.js"
$cStyle = "style.css"
$jsDir = "JS\"
$cssDir = "CSS\"

$oBaseWebFile = "wcode"
# Could be tested against any other 'Snapped' file

$fList = @()
$iList = @()

$fListC = GC $flPath
foreach ($e in $fListC) {
    $fList += ,($e.Split("`t", [StringSplitOptions]'RemoveEmptyEntries'))
}

$iListC = GC $ilPath
foreach ($e in $iListC) {
	$iList += ($e.Split("`t"))[0]
}

$tList = GC $tlPath

. ".\Tools\API.ps1"

if ((Test-Path $oRoot) -ne $TRUE) {
    New-Item -ItemType directory -Path $oRoot
}
if ((Test-Path $mRoot) -ne $TRUE) {
    New-Item -ItemType directory -Path $mRoot
}

if (CheckAll $iRoot $jsDir $oRoot $jScript) {
    DownloadH $eHost $eMode $jScript $mRoot $jScript
    CompressJ $mRoot $jScript $oRoot $jScript
}
if (CheckAll $iRoot $cssDir $oRoot $cStyle) {
    DownloadH $eHost $eMode $cStyle $mRoot $cStyle
    CompressC $mRoot $cStyle $oRoot $cStyle
}

foreach ($element in $fList) {
    if (Check "" ($element[0..1] -join '') $oRoot ($element[2..3] -join '')) {
        $oDir = $oRoot, $element[2] -join ''
        if ((Test-Path $oDir) -ne $TRUE) {
            New-Item -ItemType directory -Path $oDir
        }
        Replace "" $element[0] $element[1] $oRoot $element[2] $element[3]
    }
}

foreach ($element in $tList) {
	if (Check $iRoot $element $oRoot $oBaseWebFile) {
		$a = $TRUE
		break
	}
	else {
		$a = $FALSE
	}
}

foreach ($element in $iList) {
    $b = $FALSE
	if((Test-Path $iRoot"Component\$element.php") -eq $TRUE ) {
		$component = "Component\$element.php"
	}
	else {
		$component = "Component\$element.html"
	}
    if (Check $iRoot $component $oRoot "$element.json") {
        $elementC = "$element.json"
        DownloadH $eHost $eMode $elementC $mRoot $elementC
		CompressH $mRoot $elementC $oRoot $elementC
        $b = $TRUE;
    }
    if (($a -eq $TRUE) -or ($b -eq $TRUE)) {
        Write-Host $element
        DownloadH $eHost $eMode $element $mRoot $element
        CompressH $mRoot $element $oRoot $element
    }
}

Write-Host "menu"
DownloadH $eHost $eMode "menu" $mRoot $element
CompressH $mRoot $element $oRoot "menu"

XExit
