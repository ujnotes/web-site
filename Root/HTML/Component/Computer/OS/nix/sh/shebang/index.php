<div id='message'>
	<p>
		Portable bash shebang using env, and why sh is not bash.
	</p>
	<pre class='indent-c'><code class='block'>#!/usr/bin/env bash</code></pre>
	<p>
		<code class='inline'>env</code> resolves <code class='inline'>bash</code> from <code class='inline'>PATH</code>, which is more portable than a hardcoded interpreter path. <code class='inline'>sh</code> is not <code class='inline'>bash</code>.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
