<div id='message'>
	<h2>Prevent launcher hibernate</h2>
	<pre class='indent-c'><code class='block'>ro.HOME_APP_ADJ=1</code></pre>
	<h2>Install APK</h2>
	<pre class='indent-c'><code class='block'>pm install -r "/data/local/tmp/com._"</code></pre>
	<h2>Prevent media scan of directory</h2>
	<p>
		Create file: <code class='inline'>.nomedia</code>
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
