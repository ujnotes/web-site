@echo off
call Publish.cmd
copy .htaccess Publish\.htaccess
dir "%ProgramFiles%\Apache\HTTPD\htdocs"? | find /i "Publish" > nul
if errorLevel 1 (
	call Switch	)
