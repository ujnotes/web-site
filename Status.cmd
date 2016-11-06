@echo Off
dir "%ProgramFiles%\Apache\HTTPD\htdocs"? | find /i "Publish" > nul
if errorLevel 1 (
	echo Root	) else (
	echo Publish		)
ping -n 3 localhost > nul
