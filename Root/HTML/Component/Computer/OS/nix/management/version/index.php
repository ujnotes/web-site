<div id='message'>
	<p>
		Show OS and kernel version with release files, lsb_release, /proc/version, and uname.
	</p>
	<pre class='indent-c'><code class='block'>cat /etc/*-release
lsb_release -a
cat /proc/version</code></pre>
	<p>
		<code class='inline'>uname</code> flags:
	</p>
	<ul class="list-bullet content-list">
		<li><div><code class='inline'>-a</code>.</div></li>
		<li><div><code class='inline'>-mrs</code>.</div></li>
	</ul>
	<pre class='indent-c'><code class='block'>uname -a
uname -mrs</code></pre>
	<p>
		Red Hat:
	</p>
	<pre class='indent-c'><code class='block'>tail /etc/redhat-release</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
