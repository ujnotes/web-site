$global:Halt = $FALSE

$iRoot = "Root\"
$oRoot = "public\"
$mRoot = "interim\"

$eHost = "http://localhost"
$eMode = "mode=publish"

$flPath = ".\Config\Files.tsv" 	#File List
$ilPath = ".\Config\IDs.tsv"   	#ID List
#$tlPath = ".\Config\Template.tsv"	#Template List

$iBaseTemplateFile = "Template\Base.php"
$oBaseWebFile = "root"
# Could be tested against any other 'Snapped' file

$fList = @()
$iList = @()

$fListC = GC $flPath
foreach ($e in $fListC) {
	$fList += ,($e.Split("`t", [StringSplitOptions]'RemoveEmptyEntries'))
}

$iListC = GC $ilPath
foreach ($e in $iListC) {
	$id = ($e.Split("`t"))[0]
	if($id -ne "") {
		$iList += $id
	}
}

$addList = ("menu", "404", "manifest.json", "script.js", "style.css")

. ".\Tools\API.ps1"

if ((Test-Path $oRoot) -ne $TRUE) {
	New-Item -ItemType directory -Path $oRoot
}
if ((Test-Path $mRoot) -ne $TRUE) {
	New-Item -ItemType directory -Path $mRoot
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

#$tList = GC $tlPath
#foreach ($element in $tList) {
	if (Check $iRoot $iBaseTemplateFile $oRoot $oBaseWebFile) {
		$bTemplateChanged = $TRUE
#		break
	}
	else {
		$bTemplateChanged = $FALSE
	}
#}

function checkResourceDir {
	if((Test-Path $iRoot"Resource\$componentDir") -eq $TRUE ) {
		if ((Test-Path $mRoot$componentDir) -ne $TRUE) {
			New-Item -ItemType directory -Path $mRoot$componentDir
		}
		if ((Test-Path $oRoot$componentDir) -ne $TRUE) {
			New-Item -ItemType directory -Path $oRoot$componentDir
		}
		return $TRUE
	}
	else {
		return $FALSE
	}
}

foreach ($component in $iList) {

	$componentC = $component -replace "/","\"
	$componentDir = $component -replace "/","\"

	if((Test-Path $iRoot"Component\$component.php") -eq $TRUE ) {
		$componentFile = "Component\$component.php"
		if(checkResourceDir -eq $TRUE ) {
			$componentC += "\index"
		}
	}
	else {
		if((Test-Path $iRoot"Component\$component.html") -eq $TRUE ) {
			$componentFile = "Component\$component.html"
			if(checkResourceDir -eq $TRUE ) {
				$componentC += "\index"
			}
		}
		else {
			$componentC += "\index"
			if ((Test-Path $mRoot$componentDir) -ne $TRUE) {
				New-Item -ItemType directory -Path $mRoot$componentDir
			}
			if ((Test-Path $oRoot$componentDir) -ne $TRUE) {
				New-Item -ItemType directory -Path $oRoot$componentDir
			}

			if((Test-Path $iRoot"Component\$component\index.php") -eq $TRUE ) {
				$componentFile = "Component\$component\index.php"
			}
			else {
				$componentFile = "Component\$component\index.html"
			}
		}
	}

	$componentCJSON = "$componentC.json"

	if (Check $iRoot $componentFile $oRoot $componentCJSON) {
		Download $eHost $eMode "$component.json" $mRoot $componentCJSON
		CompressHtml $mRoot $componentCJSON $oRoot $componentCJSON
		$bComponentChanged = $TRUE;
	}
	else {
		$bComponentChanged = $FALSE;
	}

	if (($bTemplateChanged -eq $TRUE) -or ($bComponentChanged -eq $TRUE)) {
		Write-Host $component
		Download $eHost $eMode $component $mRoot "$componentC.html"
		CompressHtml $mRoot "$componentC.html" $oRoot "$componentC.html"
	}

}

foreach ($component in $addList) {
	if (($bTemplateChanged -eq $TRUE) -or ((Test-Path $oRoot\$component) -ne $TRUE)) {

		Write-Host $component

		$componentParts = $component.Split(".");
		if($componentParts.length -eq 2) {
			$extn = $componentParts[1];
		}
		else {
			$extn = "html";
		}

		if($extn -eq "html") {
			Download $eHost $eMode $component $mRoot "$component.$extn"
			CompressHtml $mRoot "$component.$extn" $oRoot "$component.$extn"
		}
		elseif($extn -eq  "js") {
			Download $eHost $eMode $component $mRoot $component
			CompressJs $mRoot $component $oRoot $component
		}
		elseif($extn -eq "css") {
			Download $eHost $eMode $component $mRoot $component
			CompressCss $mRoot $component $oRoot $component
		}
		elseif($extn -eq "json") {
			Download $eHost $eMode $component $mRoot $component
			CompressJson $mRoot $component $oRoot $component
		}
		else {
			Download $eHost $eMode $component $oRoot $component
		}

	}
}

XExit
