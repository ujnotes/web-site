<div id='message'>
	<p>
		Joakim's RunFromToken and RunAsSystem tools.
	</p>
	<p>
		Caution: this runs as System. Admin rights.
	</p>
	<h2>RunFromToken</h2>
	<p>
		Executes arg2 with the security rights token from arg1.
	</p>
	<h2>RunAsSystem</h2>
	<p>
		Executes the arg as System.
	</p>
	<h2>Cascaded</h2>
	<pre class='indent-c'><code class='block'>RunAsSystem ".\RunFromToken.exe TrustedInstaller.exe 1 Cmd.exe”</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
