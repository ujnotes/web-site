@echo Off

setLocal EnableDelayedExpansion

set tRoot=UjNotes\Website
set target1=Root
set target2=Publish
set target=""

cd /d %ProgramFiles%\Apache\HTTPD

dir htdocs? | find /i "%tRoot%" > nul
@rem negative
if !ErrorLevel! equ 1	(
    set target=%target1%) else (
dir htdocs? | find /i "%target1%" > nul
@rem positive
if !ErrorLevel! equ 0   (
    set target=%target2%)
@rem Negative
if !ErrorLevel! equ 1   (
    set target=%target1%)	)

rd htdocs
mklink /j htdocs "%Project%\%tRoot%\%target%" > nul

if errorLevel 0	(
	echo %target%
	endLocal
    ping -n 3 localhost > nul
	exit		)
pause > nul
