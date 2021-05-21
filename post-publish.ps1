. crc32.ps1

$crc = get-crc32 ./public/script.js
mv ./public/script.js ./public/script-$crc.js

Get-ChildItem ".\public\" -R -Filter *.html | 
Foreach-Object {
	$file = $_.fullName
	$text = (Get-Content -Path $file -ReadCount 0)
	$text -replace "src='/script.js", ("src='/script-"+$crc+".js") | Set-Content -NoNewline -Path $file
}
