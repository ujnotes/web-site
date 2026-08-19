<div id='message'>
	<p>
		File ownership and mode bits.
	</p>
	<h2>Check rights</h2>
	<pre class='indent-c'><code class='block'>stat -c %a &lt;Path&gt;</code></pre>
	<h2>Take ownership</h2>
	<p>
		Take ownership of a directory and all its files:
	</p>
	<pre class='indent-c'><code class='block'>chown -R &lt;User&gt;[:Group] &lt;Path&gt;</code></pre>
	<p>
		Caution: <code class='inline'>chown -R</code> changes ownership of the whole tree.
	</p>
	<h2>Executable</h2>
	<pre class='indent-c'><code class='block'>chmod +x</code></pre>
	<p>
		A hashbang (<code class='inline'>#!</code>) marks the interpreter for an executable script.
	</p>
	<h2>Read</h2>
	<p>
		<code class='inline'>+r</code> adds read permission.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
