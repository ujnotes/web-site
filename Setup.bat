@Rem Admin Rights Test
@Echo Off

Net Session >Nul 2>&1

If %ErrorLevel% NEq 0			(
    Echo Run as Administrator
    Pause
    Exit				)

Rem [System32] to [Launch Dir]
CD /D "%~dp0"

MD Root\Resource
MD Root\Files

MkLink Root\Resource\Logo.png "..\..\..\Design\Logo\Logo Web.png"
MkLink Root\Resource\Logo.svg "..\..\..\Design\Logo\Logo.svg"
MkLink Root\Resource\Logo_Full.png "..\..\..\Design\Logo Full\Logo Full Web.png"
MkLink Root\Resource\Logo_Full.svg "..\..\..\Design\Logo Full\Logo Full.svg"

MkLink Root\Resource\LG_Example.png "..\..\..\Design\Resource\LG Example.png"

MkLink Root\Resource\Logo_W.png "..\..\..\Design\Logo\Parts\Logo W Web.png"
MkLink Root\Resource\Logo_N.png "..\..\..\Design\Logo\Parts\Logo N Web.png"
MkLink Root\Resource\Logo_BackSlash.png "..\..\..\Design\Logo\Parts\Logo BackSlash Web.png"
MkLink Root\Resource\Logo_FwdSlash.png "..\..\..\Design\Logo\Parts\Logo FwdSlash Web.png"

MkLink Root\Resource\Adoption-Active.png "..\..\..\Design\Diagram\Adoption-Active.png"
MkLink Root\Resource\Adoption-Passive.png "..\..\..\Design\Diagram\Adoption-Passive.png"

MkLink Root\Resource\FavIcon.ico "..\..\..\Design\Logo\Icon\FavIcon.ico"
MkLink Root\Resource\Apple-Touch-Icon.png "..\..\..\Design\Logo\Icon\Apple Touch Icon.png"
MkLink Root\Resource\Icon_Social.png "..\..\..\Design\Resource\Social\Icon Social.png"

MkLink Root\Resource\PayPal-Button.png "..\..\..\..\Web\Resource\PayPal Button.png"

MkLink Root\Resource\Bar_Code.png "..\..\..\Design\Resource\Bar Code.png"
MkLink Root\Resource\QR_Code.png "..\..\..\Design\Resource\QR Code.png"
MkLink Root\Resource\W_Code.png "..\..\..\Design\Resource\W Code.png"

MkLink Root\Resource\LG_W_Code.png "..\..\..\Design\Resource\LG W Code.png"
MkLink Root\Resource\Broken_Slash.png "..\..\..\Design\Resource\Broken Slash.png"

MkLink Root\Resource\Screen_Guide.png "..\..\..\Design\Demo\ScreenGuide-Web.png"
MkLink Root\Resource\Comics.png "..\..\..\Design\Resource\Comics\Comics-Web.png"
MkLink Root\Resource\General-Use_Case.png "..\..\..\Design\Resource\General Use-Case\Computer-to-Computer-Combined_Web.png"

MkLink Root\Resource\Icon-Menu.png "..\..\..\Design\Resource\Icon Menu.png"

MkLink Root\File\WordList.txt "..\..\WordList.txt"
MkLink Root\File\WCode_Installer_x64.msi "..\..\..\Publish\X\WCode Installer x64.msi"
MkLink Root\File\WCode_Installer_x86.msi "..\..\..\Publish\X\WCode Installer x86.msi"

Pause
