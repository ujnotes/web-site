@echo Off
setLocal EnableDelayedExpansion

set PROJECT_PATH=%CD%
set DEV_DIR=Root
set PROD_DIR=public
set target=""
set HT_FILE=.htaccess

cd /d %ProgramFiles%\Apache\HTTPD

dir htdocs? | find /i "%PROJECT_PATH%" > nul
@rem negative
if !ErrorLevel! equ 1 (
	set target=%DEV_DIR%
) else (
	dir htdocs? | find /i "%DEV_DIR%" > nul
	if !ErrorLevel! equ 1 (
		@rem negative
		set target=%DEV_DIR%
	) else if !ErrorLevel! equ 0 (
		@rem positive
		set target=%PROD_DIR%
		dir %PROJECT_PATH%\%PROD_DIR%\%HT_FILE% | find /i "%HT_FILE%" > nul
		if !ErrorLevel! equ 1 (
			@rem negative
			copy %PROJECT_PATH%\%HT_FILE% %PROJECT_PATH%\%PROD_DIR%
		)
	)
)

rd htdocs
mklink /j htdocs "%PROJECT_PATH%\%target%" > nul

if errorLevel 0 (
	echo %target%
	endLocal
	ping -n 3 localhost > nul
) else (
	pause > nul
)
