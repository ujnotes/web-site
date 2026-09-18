<div id='message'>
	<p>
		Remove directories and files.
	</p>
	<p>
		Caution: <code class='inline'>rm -rf</code> deletes the tree and does not recover it.
	</p>
	<h2>Directory</h2>
	<p>
		Empty directory: <code class='inline'>rmdir</code>.
	</p>
	<p>
		Non-empty:
	</p>
	<pre class='indent-c'><code class='block'>rm -rf &lt;Dir&gt;</code></pre>
	<p>
		<code class='inline'>Dir</code> cannot be a path.
	</p>
	<h2>File</h2>
	<pre class='indent-c'><code class='block'>rm [&lt;Path&gt;/]&lt;match-pattern&gt;</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
