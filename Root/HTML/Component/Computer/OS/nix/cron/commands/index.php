<div id='message'>
	<p>
		<code class='inline'>crontab</code> is the per-user table of scheduled jobs on *nix.
	</p>
	<h2>Edit</h2>
	<p>
		<code class='inline'>crontab -e</code> opens a temporary file with the current job list. Saving that file installs the new table.
	</p>
	<pre class='indent-c'><code class='block'>crontab -e</code></pre>
	<h2>List</h2>
	<pre class='indent-c'><code class='block'>crontab -l</code></pre>
	<h2>Remove</h2>
	<p>
		<code class='inline'>crontab -r</code> deletes the current user's crontab.
	</p>
	<pre class='indent-c'><code class='block'>crontab -r</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
