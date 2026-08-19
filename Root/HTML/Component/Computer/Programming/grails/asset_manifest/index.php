<div id='message'>
	<h2>Combine assets into a single file</h2>
	<p>
		/*.
	</p>
	<p>
		*= require file1.css.
	</p>
	<p>
		*= require file2.css.
	</p>
	<p>
		*/.
	</p>
	<p>
		= require file1.js.
	</p>
	<p>
		= require file2.js.
	</p>
	<h2>Refer</h2>
	<pre class='indent-c'><code class='block'>&lt;asset:stylesheet src="my-manifest.css" /&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;asset:stylesheet &lt;asset:javascript src="my-manifest.js" /&gt;</code></pre>
	<h2>Ref</h2>
	<p>
		http://bertramdev.github.io/asset-pipeline/guide/usage.html#directives
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
