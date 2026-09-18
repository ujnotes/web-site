<div id='message'>
		<p>
		Cygwin notes: running a *nix environment on Windows, including pointing Cygwin home at the Windows user profile.
	</p>
	<h2>Topics</h2>
	<h4>Set Windows home as home</h4>
	<p>
		Cygwin home is not the Windows user profile by default. Set <code class='inline'>db_home</code> in <code class='inline'>/etc/nsswitch.conf</code> so Cygwin uses the Windows home directory.
	</p>

</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>