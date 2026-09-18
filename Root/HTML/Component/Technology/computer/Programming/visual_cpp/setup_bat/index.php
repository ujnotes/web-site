<div id='message'>
	<p>
		REM Set Programming=%UserProfile%\Programming.
	</p>
	<p>
		REM Admin Rights Test.
	</p>
	<pre class='indent-c'><code class='block'>NET SESSION &gt;nul 2&gt;&amp;1</code></pre>
	<h2>IF %ERRORLEVEL% NEQ 0</h2>
	<p>
		(.
	</p>
	<p>
		Echo Run as Administrator.
	</p>
	<p>
		Pause.
	</p>
	<h4>Exit</h4>
	<p>
		).
	</p>
	<p>
		REM Change Dir from System32 to Launch Dir.
	</p>
	<p>
		@cd /d "%~dp0".
	</p>
	<p>
		REM.
	</p>
	<pre class='indent-c'><code class='block'>mklink /d Documentation "%UserProfile%\Google Drive\Projects\_"</code></pre>
	<p>
		REM.
	</p>
	<p>
		Mklink _\Installer\Resources\EULA.rtf ..\..\EULA.rtf.
	</p>
	<p>
		Mklink _\Installer\Resources\Manual.rtf ..\..\Manual.rtf.
	</p>
	<p>
		REM.
	</p>
	<p>
		Md x86\Debug\_\Lang.
	</p>
	<p>
		Md x86\Release\_\Lang.
	</p>
	<p>
		Md x64\Debug\_\Lang.
	</p>
	<p>
		Md x64\Release\_\Lang.
	</p>
	<p>
		Mklink x86\Debug\_\Lang\Res_.DLL.mui ..\..\Res_\Res_.DLL.mui.
	</p>
	<p>
		Mklink x86\Release\_\Lang\Res_.DLL.mui ..\..\Res_\Res_.DLL.mui.
	</p>
	<p>
		Mklink x64\Debug\_\Lang\Res_.DLL.mui ..\..\Res_\Res_.DLL.mui.
	</p>
	<p>
		Mklink x64\Release\_\Lang\Res_.DLL.mui ..\..\Res_\Res_.DLL.mui.
	</p>
	<p>
		REM.
	</p>
	<p>
		Mklink x86\Debug\_\Splash.bmp ..\..\..\Engine\Engine\Resources\Splash.bmp.
	</p>
	<p>
		Mklink x86\Release\_\Splash.bmp ..\..\..\Engine\Engine\Resources\Splash.bmp.
	</p>
	<p>
		Mklink x64\Debug\_\Splash.bmp ..\..\..\Engine\Engine\Resources\Splash.bmp.
	</p>
	<p>
		Mklink x64\Release\_\Splash.bmp ..\..\..\Engine\Engine\Resources\Splash.bmp.
	</p>
	<p>
		Copy _\_\_.vcproj.user _\_\_.vcproj.%COMPUTERNAME%.%USERNAME%.user.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
