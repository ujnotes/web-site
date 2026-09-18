<div id='message'>
	<p>
		Create an interactive own-process service with SC CREATE (cmd.exe or regedit.exe) and start it with SC start.
	</p>
	<p>
		Services ?creator?
	</p>
	<p>
		Caution: creating and starting services needs admin rights.
	</p>
	<pre class='indent-c'><code class='block'>SC CREATE SysCmdY binPath="cmd.exe /k start" type=own type=interact
SC start SysCmdY ***</code></pre>
	<pre class='indent-c'><code class='block'>SC CREATE SysCmdX binPath= "regedit.exe" type= own type= interact
SC start SysCmdX ***</code></pre>
	<p>
		<code class='inline'>type=own</code> is own-process. <code class='inline'>type=interact</code> is interactive with the desktop.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
