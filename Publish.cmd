@echo off
dir "%ProgramFiles%\Apache\HTTPD\htdocs"? | find /i "Root" > nul
if errorLevel 1 (
	call Switch	)
powershell -ExecutionPolicy unrestricted -file .\Tools\Publish.ps1	)
