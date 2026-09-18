<div id='message'>
	<p>
		If CSS styles are missing - rebuild (purge cache).
	</p>
	<h2>1. Sourcemap</h2>
	<h4>1. in next.config.js</h4>
	<h4>1. add to config</h4>
	<h2>```</h2>
	<h4>webpack: (config, { dev, isServer }) =&gt; {</h4>
	<h4>2.</h4>
	<p>
		If (dev) {.
	</p>
	<h4>3.</h4>
	<p>
		Config.devtool = 'source-map';.
	</p>
	<p>
		Enable sourcemaps in development.
	</p>
	<h4>4.</h4>
	<p>
		}.
	</p>
	<h4>5.</h4>
	<p>
		Return config;.
	</p>
	<h4>6.</h4>
	<p>
		}.
	</p>
	<ol class="list-number content-list">
		<li><div>```.</div></li>
	</ol>
	<h4>2. source map files are located at</h4>
	<ol class="list-number content-list">
		<li><div>.next/source/_.js.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>breakpoints do not get enabled - because of source map missing.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>Restart server.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>touch next.config.js.</div></li>
	</ol>
	<p>
		3.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
