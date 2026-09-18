<div id='message'>
	<p>
		<code class='inline'>/usr/bin/open</code> opens files and applications.
	</p>
	<h2>Application</h2>
	<p>
		<code class='inline'>-a</code> names the application:
	</p>
	<pre class='indent-c'><code class='block'>/usr/bin/open -a &lt;application&gt;</code></pre>
	<p>
		Example:
	</p>
	<pre class='indent-c'><code class='block'>/usr/bin/open -a "/Applications/Google Chrome.app"</code></pre>
	<h2>Arguments</h2>
	<p>
		<code class='inline'>--args</code> passes arguments through to the application:
	</p>
	<pre class='indent-c'><code class='block'>/usr/bin/open -a "/Applications/Google Chrome.app" --args 'http://google.com/'</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
