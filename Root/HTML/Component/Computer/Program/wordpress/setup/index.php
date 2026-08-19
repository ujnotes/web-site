<div id='message'>
	<h2>Apache httpd</h2>
	<p>
		Document root - php.
	</p>
	<h2>enable</h2>
	<h4>MySQL module in php.ini</h4>
	<p>
		Extension=php_mysqli.dll.
	</p>
	<h2>Create database</h2>
	<pre class='indent-c'><code class='block'>Create database &lt;Wordpress&gt; in mySQL</code></pre>
	<h2>Create user</h2>
	<p>
		Additionally username and password.
	</p>
	<h2>Update</h2>
	<p>
		https://www.digitalocean.com/community/tutorials/how-to-configure-secure-updates-and-installations-in-wordpress-on-ubuntu
	</p>
	<h2>Install libssh2-php</h2>
	<p>
		Else SSH2 won’t show beside FTP &amp; SFTP.
	</p>
	<p>
		The public &amp; private keys should be accessible to the web-server user.
	</p>
	<p>
		WordPress knows where it is.
	</p>
	<p>
		You may specify values in wp_config.php file.
	</p>
	<p>
		Define('FS_METHOD', 'ssh2');.
	</p>
	<p>
		Define('FTP_PUBKEY','/home/wp-user/.ssh/id_rsa.pub');.
	</p>
	<p>
		Define('FTP_PRIKEY','/home/wp-user/.ssh/id_rsa');.
	</p>
	<p>
		Define('FTP_USER','wp-user');.
	</p>
	<p>
		Define('FTP_PASS','');.
	</p>
	<p>
		Define('FTP_HOST','127.0.0.1:22');.
	</p>
	<h2>For plugin</h2>
	<h4>Enable modules</h4>
	<h4>SSL &amp; Curl</h4>
	<p>
		Loads additional dlls required.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
