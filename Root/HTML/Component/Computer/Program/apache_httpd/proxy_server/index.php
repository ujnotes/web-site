<div id='message'>
	<h2>Forward</h2>
	<p>
		ProxyRequests On.
	</p>
	<p>
		ProxyVia On.
	</p>
	<pre class='indent-c'><code class='block'>&lt;Proxy *&gt;</code></pre>
	<p>
		Order deny,allow.
	</p>
	<p>
		Deny from all.
	</p>
	<p>
		Allow from internal.example.com.
	</p>
	<pre class='indent-c'><code class='block'>&lt;/Proxy&gt;</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
