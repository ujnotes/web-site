<div id='message'>
	<p>
		See [unix-linux-find-file-owner-name](http://www.cyberciti.biz/faq/unix-linux-find-file-owner-name/#lsmode).
	</p>
	<h2>ls -l</h2>
	<pre class='indent-c'><code class='block'>ls -l</code></pre>
	<p>
		Output layout:
	</p>
	<pre class='indent-c'><code class='block'>&lt;d|l&gt; &lt;owner&gt;&lt;group&gt;&lt;world&gt; [n of link] owner : group &lt;size&gt;</code></pre>
	<p>
		The owner need not be a member of the group associated with the filesystem object. When a member is removed from a group, no check is run on the filesystem. The same is true on create.
	</p>
	<h2>File type</h2>
	<p>
		First character of the mode string:
	</p>
	<ul class="list-bullet content-list">
		<li><div><code class='inline'>-</code> — regular file</div></li>
		<li><div><code class='inline'>b</code> — block special file</div></li>
		<li><div><code class='inline'>c</code> — character special file</div></li>
		<li><div><code class='inline'>d</code> — directory</div></li>
		<li><div><code class='inline'>l</code> — symbolic link</div></li>
		<li><div><code class='inline'>p</code> — FIFO</div></li>
		<li><div><code class='inline'>s</code> — socket</div></li>
		<li><div><code class='inline'>w</code> — whiteout</div></li>
	</ul>
	<h2>Permission bits</h2>
	<p>
		If <code class='inline'>r</code>, the file is readable; if <code class='inline'>-</code>, it is not readable.
	</p>
	<p>
		If <code class='inline'>w</code>, the file is writable; if <code class='inline'>-</code>, it is not writable.
	</p>
	<p>
		The first of the following that applies:
	</p>
	<ul class="list-bullet content-list">
		<li><div><code class='inline'>S</code> — If in the owner permissions, the file is not executable and set-user-ID mode is set. If in the group permissions, the file is not executable and set-group-ID mode is set.</div></li>
		<li><div><code class='inline'>s</code> — If in the owner permissions, the file is executable and set-user-ID mode is set. If in the group permissions, the file is executable and set-group-ID mode is set.</div></li>
		<li><div><code class='inline'>x</code> — The file is executable or the directory is searchable.</div></li>
		<li><div><code class='inline'>-</code> — The file is neither readable, writable, executable, nor set-user-ID nor set-group-ID mode, nor sticky.</div></li>
	</ul>
	<p>
		These next two apply only to the third character in the last group (other permissions):
	</p>
	<ul class="list-bullet content-list">
		<li><div><code class='inline'>T</code> — The sticky bit is set (mode 1000), but not execute or search permission.</div></li>
		<li><div><code class='inline'>t</code> — The sticky bit is set (mode 1000), and is searchable or executable.</div></li>
	</ul>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
