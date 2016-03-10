@Rem Admin Rights Test
@Echo Off

Net Session >Nul 2>&1

If %ErrorLevel% NEq 0			(
    Echo Run as Administrator
    cd %ProgramFiles%\Apache\HTTPD
    Dir *htdocs
    Pause
    Exit				        )

Set TRoot=UjNotes\Website
Set Target1=Root
Set Target2=Publish
Set Target=0

CD /D %ProgramFiles%\Apache\HTTPD

Dir htdocs? | Find /i "%Target1%" > Nul
If %ErrorLevel% EQU 0   (
    Set Target=%Target2%)
If %ErrorLevel% EQU 1   (
    Set Target=%Target1%)

RD htdocs
MkLink /d htdocs "%Project%\%TRoot%\%Target%"
Echo %Target%
Pause
If %ErrorLevel% EQU 0   (
    Exit                )
Pause
