<div id='message'>
	<p>
		Setting the “authentication plugin” to the older one at the user level is not sufficient if the “default authentication plugin” for the server is set to the newer plugin.
	</p>
	<p>
		Because the old system cannot negotiate with the new plugin.
	</p>
	<p>
		You must therefore change the server’s “default authentication plugin” with: defaultauthenticationplugin = mysqlnativepassword in the my.ini configuration file. (%ProgramData%\MySQL\MySQL Server 8.0\my.ini on Windows). And then restart the server.
	</p>
	<h2>my.ini</h2>
	<p>
		Defaultauthenticationplugin = mysqlnativepassword.
	</p>
	<p>
		Mysql&gt;.
	</p>
	<pre class='indent-c'><code class='block'>alter user '&lt;user&gt;'@'localhost' identified with mysql_native_password by '&lt;Password&gt;’</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
