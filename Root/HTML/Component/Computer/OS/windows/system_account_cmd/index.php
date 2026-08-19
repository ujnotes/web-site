<div id='message'>
	<p>
		Caution: this opens a command prompt as System. Admin rights.
	</p>
	<h2>XP | 2003</h2>
	<pre class='indent-c'><code class='block'>at 01:23 /interactive cmd.exe</code></pre>
	<p>
		<code class='inline'>/interactive</code> lets the scheduled task interact with the desktop. <code class='inline'>01:23</code> is the run time.
	</p>
	<h2>7 | 8</h2>
	<pre class='indent-c'><code class='block'>psexec -i -s cmd.exe</code></pre>
	<p>
		<code class='inline'>-i</code> is interactive. <code class='inline'>-s</code> runs as System.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
