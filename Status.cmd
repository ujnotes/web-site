@echo Off

set PROJECT_PATH=%CD%

cd /d %ProgramFiles%\Apache\HTTPD

@dir htdocs? | find /i "%PROJECT_PATH%" > nul
if errorLevel 1 (
	dir htdocs? | find /i "htdocs"
) else (
	dir "%ProgramFiles%\Apache\HTTPD\htdocs"? | find /i "%PROJECT_PATH%\public" > nul
	if errorLevel 1 (
		echo Root
	) else (
		echo public
	)
)

ping -n 3 localhost > nul
