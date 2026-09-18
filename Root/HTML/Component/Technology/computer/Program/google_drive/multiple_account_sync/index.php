<div id='message'>
	<ol class="list-number content-list">
		<li><div>Create backup directory.</div></li>
	</ol>
	<p>
		Preferably in the %Home%\GDrive directory.
	</p>
	<h2>2. Run setup script</h2>
	<p>
		Set UserProfile=_@_.
	</p>
	<p>
		CD %LocalAppData%\Google\Drive.
	</p>
	<p>
		MD %UserProfile%.
	</p>
	<p>
		MD "%USERPROFILE%\AppData\Roaming"&gt;nul.
	</p>
	<p>
		MD "%USERPROFILE%\AppData\Local\Application Data"&gt;nul.
	</p>
	<p>
		MD "%USERPROFILE%\Application Data"&gt;nul.
	</p>
	<p>
		MD "%USERPROFILE%\Local Settings\Application Data"&gt;nul.
	</p>
	<p>
		MD "%USERPROFILE%\My Documents"&gt;nul.
	</p>
	<p>
		MD "%USERPROFILE%\Documents"&gt;nul.
	</p>
	<ol class="list-number content-list">
		<li><div>Create a bat file GDriveSync.bat.</div></li>
	</ol>
	<h2>with following content</h2>
	<p>
		@ECHO OFF.
	</p>
	<pre class='indent-c'><code class='block'>Ping -n 10 localhost&gt;nul</code></pre>
	<p>
		Set USERNAME=_@_.
	</p>
	<p>
		Set USERPROFILE=%~dp0%USERNAME%.
	</p>
	<p>
		Set Path=C:\Program Files (x86)\Google\Drive.
	</p>
	<p>
		Start googledrivesync.
	</p>
	<h2>4. Run</h2>
	<ol class="list-number content-list">
		<li><div>Sign in.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>In advanced options - select the backup directory (from 1).</div></li>
	</ol>
	<h2>5. Create a startup entry for this bat file</h2>
	<ol class="list-number content-list">
		<li><div>HKCU\Software \Microsoft\CurrentVersion\Run.</div></li>
	</ol>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
