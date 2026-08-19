<div id='message'>
	<p>
		<code class='inline'>su</code> is needed.
	</p>
	<h2>Put</h2>
	<pre class='indent-c'><code class='block'>scp &lt;src_Path&gt; &lt;user&gt;@&lt;ip&gt;:&lt;dest_Path&gt;</code></pre>
	<h2>Get</h2>
	<pre class='indent-c'><code class='block'>scp &lt;user&gt;@&lt;ip&gt;:&lt;dest_Path&gt; &lt;src_Path&gt;</code></pre>
	<h2>Debug</h2>
	<p>
		<code class='inline'>-v</code>.
	</p>
	<p>
		Use root for password based authentication.
	</p>
	<h2>Bandwidth</h2>
	<p>
		<code class='inline'>-l 400</code>.
	</p>
	<h2>Recursive</h2>
	<p>
		<code class='inline'>-r</code>.
	</p>
	<h2>Silent</h2>
	<p>
		<code class='inline'>-q</code>.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
