<div id='message'>
	<p>
		Working notes on Reverse Proxy: ProxyPass.
	</p>
	<p>
		LoadModule proxy_module modules/mod_proxy.so.
	</p>
	<p>
		LoadModule proxy_http_module modules/mod_proxy_http.so.
	</p>
	<h2>ProxyPass</h2>
	<pre class='indent-c'><code class='block'>/ http://192.168.1._/</code></pre>
	<p>
		Remember that disabling ProxyRequests does not prevent you from using a reverse proxy with the ‘ProxyPass’ directive.
	</p>
	<p>
		ProxyRequests off.
	</p>
	<p>
		?caused crash?
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
