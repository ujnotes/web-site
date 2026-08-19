<div id='message'>
	<p>
		Ensure that required dlls for the modules are also loaded.
	</p>
	<ul class="list-bullet content-list">
		<li><div>Either by adding them to the %PATH.</div></li>
	</ul>
	<ul class="list-bullet content-list">
		<li><div>Or by explicitly loading them in the httpd.conf file through ‘LoadFile’.</div></li>
	</ul>
	<p>
		Required dlls.
	</p>
	<h2>Curl and OpenSSL</h2>
	<p>
		Libssh2.dll, libeay32.dll and ssleay32.dll.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
