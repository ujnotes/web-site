<div id='message'>
	<p>
		View.
	</p>
	<p>
		Firebase functions:config:get.
	</p>
	<h2>Write to file</h2>
	<p>
		Firebase functions:config:get &gt; .runtimeconfig.json.
	</p>
	<p>
		Not possible to import directly.
	</p>
	<h2>Set</h2>
	<p>
		Firebase functions:config:set.
	</p>
	<pre class='indent-c'><code class='block'>&lt;Group&gt;.&lt;key&gt;="&lt;value&gt;" ...</code></pre>
	<p>
		Group and key must be small case.
	</p>
	<h2>Multiple</h2>
	<p>
		?
	</p>
	<h2>Expands as</h2>
	<h4>{</h4>
	<pre class='indent-c'><code class='block'>{ “&lt;Group&gt;”: {</code></pre>
	<pre class='indent-c'><code class='block'>“&lt;key&gt;”: “&lt;value&gt;</code></pre>
	<p>
		}.
	</p>
	<p>
		}.
	</p>
	<h2>access</h2>
	<pre class='indent-c'><code class='block'>access functions.config().&lt;key&gt;.&lt;value&gt;</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
