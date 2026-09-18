<div id='message'>
	<p>
		A wrapper over ‘certbot’.
	</p>
	<p>
		Passes params to certbot (unless consumed by it).
	</p>
	<h2>No way to specify the primary domain for multiple domain certificate</h2>
	<p>
		Perhaps the first one from the.
	</p>
	<pre class='indent-c'><code class='block'>certbot-auto --apache -d &lt;primary-domain&gt; -d &lt;secondary-domain&gt; …</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
