<div id='message'>
	<h2>Login screen background</h2>
	<p>
		See [how to change the login screen background on Windows 10](http://www.howtogeek.com/223875/how-to-change-the-login-screen-background-on-windows-10/).
	</p>
	<pre class='indent-c'><code class='block'>HKEY_LOCAL_MACHINE\Software\Policies\Microsoft\Windows\System</code></pre>
	<p>
		Create DWORD <code class='inline'>DisableLogonBackgroundImage</code> = <code class='inline'>1</code>. Delete it or set it to <code class='inline'>0</code> to revert.
	</p>
	<p>
		This displays a flat colour. To change the colour, use <strong>Personalize &gt; Theme colour</strong>, or:
	</p>
	<pre class='indent-c'><code class='block'>rundll32.exe shell32.dll,Control_RunDLL desk.cpl,Advanced,@Advanced</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
