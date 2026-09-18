<div id='message'>
	<p>
		Take ownership of a path. <code class='inline'>/f</code> is the file or directory. <code class='inline'>/r</code> recurses.
	</p>
	<pre class='indent-c'><code class='block'>takeown /f &lt;path&gt; /r</code></pre>
	<p>
		Current directory, assign to Administrators, recurse, and answer Yes to prompts:
	</p>
	<pre class='indent-c'><code class='block'>takeown /F "." /A /R /D Y</code></pre>
	<p>
		Caution: <code class='inline'>takeown</code> changes ownership and typically needs elevation.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
