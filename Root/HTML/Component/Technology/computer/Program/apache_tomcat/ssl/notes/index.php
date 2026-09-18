<div id='message'>
	<p>
		The certificate file i.e. keystore file can be a .p12 file, need not be a ‘.jks’.
	</p>
	<p>
		! Should be accessible by tomcat (user).
	</p>
	<p>
		?should have password?
	</p>
	<p>
		<strong>Default port.</strong> 443.
	</p>
	<h2>Prefer APR protocol</h2>
	<p>
		&lt;Connector port="1443".
	</p>
	<p>
		MaxThreads="200".
	</p>
	<p>
		EnableLookups="false".
	</p>
	<p>
		DisableUploadTimeout="true".
	</p>
	<p>
		AcceptCount="100".
	</p>
	<p>
		Debug="0".
	</p>
	<p>
		Scheme="https".
	</p>
	<p>
		Secure="true".
	</p>
	<p>
		ClientAuth="false".
	</p>
	<p>
		SslProtocol="TLS".
	</p>
	<p>
		SSLEnabled="true".
	</p>
	<pre class='indent-c'><code class='block'>keystoreFile="/opt/&lt;company&gt;/_.keystore|p12"</code></pre>
	<p>
		KeystoreType="PKCS12".
	</p>
	<h2>keystorePass="password"</h2>
	<p>
		Ciphers="SSL_RSA_WITH_RC4_128_MD5,SSL_RSA_WITH_RC4_128_SHA,TLS_RSA_WITH_AES_128_CBC_SHA,TLS_DHE_RSA_WITH_AES_128_CBC_SHA,TLS_DHE_DSS_WITH_AES_128_CBC_SHA,SSL_RSA_WITH_3DES_EDE_CBC_SHA,SSL_DHE_RSA_WITH_3DES_EDE_CBC_SHA,SSL_DHE_DSS_WITH_3DES_EDE_CBC_SHA,TLS_RSA_WITH_AES_256_CBC_SHA,TLS_DHE_RSA_WITH_AES_256_CBC_SHA,TLS_DHE_DSS_WITH_AES_256_CBC_SHA".
	</p>
	<p>
		URIEncoding="UTF-8" /&gt;.
	</p>
	<p>
		________________.
	</p>
	<h2>org.apache.coyote.http11.Http11Protocol</h2>
	<pre class='indent-c'><code class='block'>org.apache.coyote.http11.Http11Protocol &lt;Connector</code></pre>
	<p>
		Protocol="HTTP/1.1".
	</p>
	<p>
		Port="443".
	</p>
	<p>
		MaxThreads="200".
	</p>
	<p>
		Scheme="https".
	</p>
	<p>
		Secure="true".
	</p>
	<p>
		SSLEnabled="true".
	</p>
	<p>
		SSLCertificateFile="/usr/local/ssl/server.crt".
	</p>
	<p>
		SSLCertificateKeyFile="/usr/local/ssl/server.pem".
	</p>
	<p>
		SSLVerifyClient="optional".
	</p>
	<p>
		SSLProtocol="TLSv1"/&gt;.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
