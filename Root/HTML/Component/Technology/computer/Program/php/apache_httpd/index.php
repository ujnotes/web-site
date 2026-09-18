<div id='message'>
	<h2>Download</h2>
	<p>
		Thread safe for use with Apache (will contain php5apache2_4.dll).
	</p>
	<p>
		Apache config.
	</p>
	<p>
		Conf/httpd.conf (Append).
	</p>
	<h2>PHPIniDir "C:\Program Files\PHP"</h2>
	<p>
		Should not have a trailing slash.
	</p>
	<p>
		LoadFile "C:\Program Files\PHP\php5apache2_4.dll".
	</p>
	<p>
		LoadModule php5_module "C:\Program Files\PHP\php5apache2_4.dll".
	</p>
	<p>
		AddType application/x-httpd-php .php.
	</p>
	<p>
		PHPIniDir "/Program Files/PHP".
	</p>
	<p>
		LoadFile "/Program Files/PHP/php7apache2_4.dll".
	</p>
	<p>
		LoadModule php7_module "/Program Files/PHP/php7apache2_4.dll".
	</p>
	<p>
		AddHandler application/x-httpd-php .php.
	</p>
	<p>
		AddType application/x-httpd-php .php.
	</p>
	<p>
		PHP.ini.
	</p>
	<pre class='indent-c'><code class='block'>rename -production/development : ini</code></pre>
	<p>
		?[PHP] - optional?
	</p>
	<ul class="list-bullet content-list">
		<li><div>if ini is required.</div></li>
	</ul>
	<p>
		Log.
	</p>
	<h2>Add PHP path to path variable</h2>
	<p>
		Required for modules like CURL to work.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
