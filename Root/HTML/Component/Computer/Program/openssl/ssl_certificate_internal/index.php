<div id='message'>
	<p>
		http://rubayathasan.com/tutorial/apache-ssl-on-windows
	</p>
	<p>
		Cmd (not ps).
	</p>
	<ol class="list-number content-list">
		<li><div>set OPENSSL_CONF=C:\Programs\Apache\httpd\Archive\openssl.cnf.</div></li>
	</ol>
	<pre class='indent-c'><code class='block'>2. openssl req -new -out server.csr</code></pre>
	<p>
		Passphrase is only required in next step, not in httpd.
	</p>
	<h2>Debug</h2>
	<pre class='indent-c'><code class='block'>openssl req -in server.csr -text -noout</code></pre>
	<pre class='indent-c'><code class='block'>3. openssl rsa -in privkey.pem -out server.key</code></pre>
	<ol class="list-number content-list">
		<li><div>set RANDFILE=.rnd.</div></li>
	</ol>
	<pre class='indent-c'><code class='block'>5. openssl x509 -in server.csr -out server.crt -req -signkey server.key -days 365</code></pre>
	<h2>Check</h2>
	<pre class='indent-c'><code class='block'>openssl x509 -in certificate.crt -text -noout</code></pre>
	<p>
		This generates V1 type certs, the extensions like SANs are not carried over.
	</p>
	<pre class='indent-c'><code class='block'>openssl req -new -x509 -newkey rsa:2048 -sha256 -nodes -keyout server.key -days &lt;days&gt; -out server.crt -config cert.cnf</code></pre>
	<p>
		Tested with windows.
	</p>
	<p>
		Openssl from httpd.
	</p>
	<p>
		Generates V3 type certs.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
