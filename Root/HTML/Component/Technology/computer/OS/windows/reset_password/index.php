<div id='message'>
	<p>
		Reset a local password from the recovery console by swapping the on-screen keyboard for <code class='inline'>cmd.exe</code>.
	</p>
	<p>
		Caution: this replaces <code class='inline'>osk.exe</code> under <code class='inline'>c:\Windows</code>. Revert after login.
	</p>
	<h2>Recovery console</h2>
	<p>
		Log in to the recovery console:
	</p>
	<pre class='indent-c'><code class='block'>cd c:\Windows
move osk.exe xosk.exe
cp cmd.exe osk.exe</code></pre>
	<p>
		Exit and restart.
	</p>
	<h2>Logon screen</h2>
	<p>
		On the password login screen, press Win+U and select Start On-Screen Keyboard. A command prompt should start instead of the on-screen keyboard.
	</p>
	<pre class='indent-c'><code class='block'>net user admin *</code></pre>
	<p>
		Enter the new password. Login with this <code class='inline'>&lt;new-password&gt;</code>.
	</p>
	<h2>Revert</h2>
	<p>
		Log in to the recovery console again and restore <code class='inline'>osk.exe</code>:
	</p>
	<pre class='indent-c'><code class='block'>cd c:\windows
Del osk.exe
move xosk.exe osk.exe</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
