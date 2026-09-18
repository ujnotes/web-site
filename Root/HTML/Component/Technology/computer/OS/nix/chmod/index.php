<div id='message'>
	<p>
		<code class='inline'>chmod</code> changes mode bits on one or more paths. The form is a permission set, optional switches, then the path list.
	</p>
	<pre class='indent-c'><code class='block'>chmod &lt;permission-set&gt; [switches] &lt;path&gt; [, ..]</code></pre>
	<h2>Permission set</h2>
	<p>
		Who:
	</p>
	<ul class="list-bullet content-list">
		<li><div><code class='inline'>a</code> — all</div></li>
		<li><div><code class='inline'>u</code> — user (owner)</div></li>
		<li><div><code class='inline'>g</code> — group</div></li>
		<li><div><code class='inline'>o</code> — others</div></li>
	</ul>
	<p>
		Then <code class='inline'>+</code> to add or <code class='inline'>-</code> to remove, then the permission.
	</p>
	<h2>Recursive</h2>
	<p>
		<code class='inline'>-R</code> applies the change recursively.
	</p>
	<h2>All access</h2>
	<p>
		<code class='inline'>chmod 777 -R .</code> grants all access (RWX) on the current directory tree.
	</p>
	<pre class='indent-c'><code class='block'>chmod 777 -R .</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
