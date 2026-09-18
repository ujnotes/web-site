<div id='message'>
	<h2>ETag header</h2>
	<p>
		If the cache expires, the client requests with the ETag = fingerprint (as sent by the server in the past). The server checks the fingerprint and returns <code class='inline'>Not_modified</code> if not changed.
	</p>
	<p>
		If the file changes before it expires in the cache, that cannot be communicated to the browser.
	</p>
	<p>
		Thus, file versioning (by index / fingerprinting) is recommended for invalidation control.
	</p>
	<h2>Recommended expiry</h2>
	<p>
		1 week to 1 year for resources.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
