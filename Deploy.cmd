@echo off
call Publish
firebase deploy --only hosting
rem echo *
pause
