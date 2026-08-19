<div id='message'>
	<h2>Place</h2>
	<h2>Path root</h2>
	<p>
		%ProgramFiles%
	</p>
	<h2>Directory</h2>
	<p>
		Apache\httpd.
	</p>
	<h2>Edit configuration file</h2>
	<h2>Location</h2>
	<p>
		Conf\httpd.conf.
	</p>
	<h2>ServerRoot</h2>
	<p>
		"C:/Program Files/Apache/HTTPD".
	</p>
	<h2>DocumentRoot</h2>
	<p>
		“C:/ProgramData/Apache/HTTPD”.
	</p>
	<pre class='indent-c'><code class='block'>ServerName                localhost[:&lt;port&gt;]</code></pre>
	<h2>LoadModule</h2>
	<p>
		Rewrite_module modules/mod_rewrite.so.
	</p>
	<p>
		Rewrite_module modules/mod_ssl.so.
	</p>
	<p>
		&lt;.
	</p>
	<h2>DocumentRoot</h2>
	<p>
		"C:/Program Files/Apache/HTTPD/htdocs/".
	</p>
	<p>
		&lt;.
	</p>
	<h2>Directory</h2>
	<p>
		"C:/Program Files/Apache/HTTPD/htdocs/".
	</p>
	<h4>AllowOverride</h4>
	<p>
		All.
	</p>
	<p>
		&gt;.
	</p>
	<p>
		&gt;.
	</p>
	<h2>Directories</h2>
	<h4>mkdir %programData%\Apache\httpd\htdocs</h4>
	<p>
		Httpd\logs.
	</p>
	<p>
		Install.
	</p>
	<h2>CD</h2>
	<p>
		"C:/Program Files/Apache/HTTPD/bin”.
	</p>
	<pre class='indent-c'><code class='block'>service:                httpd -k install -n "Apache httpd"</code></pre>
	<pre class='indent-c'><code class='block'>Uninstall:                httpd -k uninstall -n "Apache httpd"</code></pre>
	<p>
		Start.
	</p>
	<h2>as Program</h2>
	<p>
		Httpd.
	</p>
	<p>
		As Service.
	</p>
	<p>
		Gotchas.
	</p>
	<p>
		Check if the required `MS Visual Studio redistributable’ is installed.
	</p>
	<p>
		Can result in ‘unrelated’ errors.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
