function Check($iRoot, $i, $oRoot, $o) {  #Overwrite?
	if ((Test-Path $iRoot$i) -ne $TRUE) {
		Write-Host "Input file: $iRoot$i not found. Fatal Error!"
		$global:Halt = $TRUE
		XExit
	}
	if (Test-Path $oRoot$o) {
		if((Get-Item $oRoot$o).LastWriteTime -ge (Get-Item $iRoot$i).LastWriteTime) {
			return $FALSE;
		}
	}
	Write-Host $o
	return $TRUE;
}

function CheckAll($iRoot, $iDir, $oRoot, $o) { #Overwrite?
	$fileEntries = [IO.Directory]::GetFiles("$iRoot$iDir")
	foreach($filePath in $fileEntries) {
		if(Check "" $filePath $oRoot $o) {
			return $TRUE
		}
	}
	return $FALSE
}

function Replace($iRoot, $iDir, $i, $oRoot, $oDir, $o) {
	if ((Test-path $oRoot$oDir$o)) {
		Remove-Item $oRoot$oDir$o
	}
	Copy-Item "$iRoot$iDir$i" "$oRoot$oDir"
	Rename-Item $oRoot$oDir$i $o
}

function Download($eHost, $eMode, $i, $oRoot, $o) {
	(New-Object System.Net.WebClient).DownloadFile("$eHost/$i`?$eMode", "$oRoot$o")
	Status $?
}

function CompressHtml($iRoot, $i, $oRoot, $o) {
	java -jar Tools\HTML-Compressor.jar -t html --compress-js --js-compressor closure --closure-opt-level simple --compress-css -o $oRoot$o $iRoot$i
	Status $?
}

function CompressJs($iRoot, $i, $oRoot, $o) {
	java -jar Tools\Compiler-JavaScript.jar --js $iRoot$i --js_output_file $oRoot$o
	Status $?
}

function CompressCss($iRoot, $i, $oRoot, $o) {
	java -jar Tools\Closure-StyleSheets.jar --output-file $oRoot$o $iRoot$i
	Status $?
}

function CompressJson($iRoot, $i, $oRoot, $o) {
	json-minify $iRoot$i | out-file -encoding ASCII $oRoot$o
	Status $?
}

function Status($Success) {
	if($global:Halt -eq $FALSE) {
		if($Success -eq $FALSE) {
			$global:Halt = $TRUE
		}
	}
}

function XExit() {
	if($Halt) {
		$NULL = $host.UI.RawUI.ReadKey("NoEcho,IncludeKeyDown")
		Exit
	}
	else {
		Remove-Item .\Interim -Force -Recurse
		Exit
	}
}
