@echo Off

for %%i in ("%~dp0..") do set "WEB_PROJECT=%%~fi"
for %%i in (%WEB_PROJECT%) do set "WEB_PROJECT=%%~ni
set tRoot=%WEB_PROJECT%\Website

cd /d %ProgramFiles%\Apache\HTTPD

@dir htdocs? | find /i "%tRoot%" > nul
if errorLevel 1						(
	dir htdocs? | find /i "htdocs"	) else	(
dir "%ProgramFiles%\Apache\HTTPD\htdocs"? | find /i "Publish" > nul
if errorLevel 1 (
	echo Root	) else	(
	echo Publish		)					)

ping -n 3 localhost > nul
