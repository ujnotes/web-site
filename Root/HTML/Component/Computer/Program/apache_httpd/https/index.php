<div id='message'>
	<p>
		http://rubayathasan.com/tutorial/apache-ssl-on-windows
	</p>
	<h2>Place</h2>
	<p>
		"server.cert" and "server.key".
	</p>
	<p>
		At.
	</p>
	<p>
		"C:\Programs\Apache\httpd\conf\".
	</p>
	<p>
		Conf/httpd.conf.
	</p>
	<p>
		LoadModule.
	</p>
	<h2>ssl_module</h2>
	<p>
		Socache_shmcb_module.
	</p>
	<p>
		Include conf/extra/httpd-ssl.conf.
	</p>
	<p>
		Conf/extra/httpd-ssl.conf.
	</p>
	<pre class='indent-c'><code class='block'>&lt;VirtualHost &lt;_default_|domain_name&gt;:443&gt;</code></pre>
	<p>
		DocumentRoot.
	</p>
	<h2>Logs location</h2>
	<p>
		Relative (‘logs’ and not ‘/’).
	</p>
	<p>
		ErrorLog "logs/error_ssl.log".
	</p>
	<p>
		TransferLog "logs/access_ssl.log".
	</p>
	<p>
		SSLEngine on.
	</p>
	<pre class='indent-c'><code class='block'>SSLCertificateFile "${SRVROOT}/conf/server.crt"</code></pre>
	<pre class='indent-c'><code class='block'>SSLCertificateKeyFile "${SRVROOT}/conf/server.key"</code></pre>
	<p>
		Comment out.
	</p>
	<h4>SSLSessionCache: 'shmcb'</h4>
	<p>
		If not including ‘socache_shmcb_module’.
	</p>
	<p>
		Ensure full url is as needed in browser when testing.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
