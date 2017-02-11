@echo off
call Publish.cmd
copy .htaccess public\.htaccess
dir "%ProgramFiles%\Apache\HTTPD\htdocs"? | find /i "public" > nul
if errorLevel 1 (
	call Switch	)
