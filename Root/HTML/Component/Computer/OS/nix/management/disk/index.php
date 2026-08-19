<div id='message'>
	<p>
		<code class='inline'>df</code> reports disk space. <code class='inline'>du</code> reports disk usage of files and directories.
	</p>
	<h2>Disk space</h2>
	<pre class='indent-c'><code class='block'>df</code></pre>
	<h2>Disk usage</h2>
	<p>
		<code class='inline'>-f</code>. <code class='inline'>-a</code> includes files. <code class='inline'>-c</code> prints a total.
	</p>
	<pre class='indent-c'><code class='block'>du -f
du -a
du -c</code></pre>
	<p>
		Directory-wise size, human readable (mac):
	</p>
	<pre class='indent-c'><code class='block'>du -sh *</code></pre>
	<p>
		Limit depth:
	</p>
	<pre class='indent-c'><code class='block'>du --max-depth=1</code></pre>
	<h2>Deletion of locked files</h2>
	<p>
		Locked files can be deleted but still occupy disk space. Free space then shows a lower count.
	</p>
	<p>
		Caution: listing these requires <code class='inline'>sudo</code>.
	</p>
	<p>
		Get locked deleted files:
	</p>
	<pre class='indent-c'><code class='block'>sudo /usr/sbin/lsof | grep deleted</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
