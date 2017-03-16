@echo off
call Publish
firebase deploy --only hosting
echo *
pause
