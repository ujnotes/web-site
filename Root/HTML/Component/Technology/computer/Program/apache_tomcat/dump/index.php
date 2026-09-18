<div id='message'>
	<p>
		LoadModule dumpio_module modules/mod_dumpio.so.
	</p>
	<pre class='indent-c'><code class='block'>&lt;VirtualHost *:80&gt;</code></pre>
	<p>
		DocumentRoot /var/www/packager/web.
	</p>
	<p>
		ServerName lms-packager.local.
	</p>
	<pre class='indent-c'><code class='block'>ErrorLog ${APACHE_LOG_DIR}/packager-error.log</code></pre>
	<pre class='indent-c'><code class='block'>CustomLog ${APACHE_LOG_DIR}/packager-access.log combined</code></pre>
	<p>
		DumpIOInput On.
	</p>
	<p>
		DumpIOOutput On.
	</p>
	<p>
		LogLevel dumpio:trace7.
	</p>
	<pre class='indent-c'><code class='block'>&lt;/VirtualHost&gt;</code></pre>
	<p>
		Server level config.
	</p>
	<p>
		Not from .htaccess.
	</p>
	<p>
		Also not in vhost log but that of server.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
