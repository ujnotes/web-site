<div id='message'>
	<p>
		#.
	</p>
	<h3>This is the Apache server configuration file providing SSL support.</h3>
	<h3>It contains the configuration directives to instruct the server how to.</h3>
	<h3>serve pages over an https connection. For detailed information about these.</h3>
	<pre class='indent-c'><code class='block'># directives see &lt;URL:http://httpd.apache.org/docs/2.4/mod/mod_ssl.html&gt;</code></pre>
	<p>
		#.
	</p>
	<h3>Do NOT simply read the instructions in here without understanding.</h3>
	<h2># what they do.</h2>
	<p>
		They're here only as hints or reminders. If you are unsure.
	</p>
	<h3>consult the online docs. You have been warned.</h3>
	<p>
		#.
	</p>
	<p>
		<strong># Required modules.</strong> Mod_log_config, mod_setenvif, mod_ssl,.
	</p>
	<h2>#</h2>
	<p>
		Socache_shmcb_module (for default value of SSLSessionCache).
	</p>
	<p>
		#.
	</p>
	<h2># Pseudo Random Number Generator (PRNG)</h2>
	<h3>Configure one or more sources to seed the PRNG of the SSL library.</h3>
	<h3>The seed data should be of good random quality.</h3>
	<h3>WARNING! On some platforms /dev/random blocks if not enough entropy.</h3>
	<h3>is available. This means you then cannot use the /dev/random device.</h3>
	<h3>because it would lead to very long connection times (as long as.</h3>
	<h3>it requires to make more entropy available). But usually those.</h3>
	<h3>platforms additionally provide a /dev/urandom device which doesn't.</h3>
	<h3>block. So, if available, use this one instead. Read the mod_ssl User.</h3>
	<h3>Manual for more details.</h3>
	<p>
		#.
	</p>
	<h2>#SSLRandomSeed startup file:/dev/random</h2>
	<p>
		512.
	</p>
	<p>
		#SSLRandomSeed startup file:/dev/urandom 512.
	</p>
	<h2>#SSLRandomSeed connect file:/dev/random</h2>
	<p>
		512.
	</p>
	<p>
		#SSLRandomSeed connect file:/dev/urandom 512.
	</p>
	<p>
		#.
	</p>
	<h3>When we also provide SSL we have to listen to the.</h3>
	<h3>standard HTTP port (see above) and to the HTTPS port.</h3>
	<p>
		#.
	</p>
	<p>
		Listen 443.
	</p>
	<p>
		##.
	</p>
	<h2>##</h2>
	<p>
		SSL Global Context.
	</p>
	<p>
		##.
	</p>
	<h2>##</h2>
	<p>
		All SSL configuration in this context applies both to.
	</p>
	<h2>##</h2>
	<p>
		The main server and all SSL-enabled virtual hosts.
	</p>
	<p>
		##.
	</p>
	<h2>#</h2>
	<p>
		SSL Cipher Suite:
	</p>
	<h2>#</h2>
	<p>
		List the ciphers that the client is permitted to negotiate,.
	</p>
	<h2>#</h2>
	<p>
		And that httpd will negotiate as the client of a proxied server.
	</p>
	<h2>#</h2>
	<p>
		See the OpenSSL documentation for a complete list of ciphers, and.
	</p>
	<h2>#</h2>
	<p>
		Ensure these follow appropriate best practices for this deployment.
	</p>
	<h2>#</h2>
	<p>
		Httpd 2.2.30, 2.4.13 and later force-disable aNULL, eNULL and EXP ciphers,.
	</p>
	<h2>#</h2>
	<p>
		While OpenSSL disabled these by default in 0.9.8zf/1.0.0r/1.0.1m/1.0.2a.
	</p>
	<p>
		SSLCipherSuite HIGH:MEDIUM:!MD5:!RC4:!3DES.
	</p>
	<p>
		SSLProxyCipherSuite HIGH:MEDIUM:!MD5:!RC4:!3DES.
	</p>
	<h2>#</h2>
	<p>
		By the end of 2016, only TLSv1.2 ciphers should remain in use.
	</p>
	<h2>#</h2>
	<p>
		Older ciphers should be disallowed as soon as possible, while the.
	</p>
	<h2>#</h2>
	<p>
		KRSA ciphers do not offer forward secrecy. These changes inhibit.
	</p>
	<h2>#</h2>
	<p>
		Older clients (such as IE6 SP2 or IE8 on Windows XP, or other legacy.
	</p>
	<h2>#</h2>
	<p>
		Non-browser tooling) from successfully connecting.
	</p>
	<p>
		#.
	</p>
	<h2>#</h2>
	<p>
		To restrict mod_ssl to use only TLSv1.2 ciphers, and disable.
	</p>
	<h2>#</h2>
	<p>
		Those protocols which do not support forward secrecy, replace.
	</p>
	<h2>#</h2>
	<p>
		The SSLCipherSuite and SSLProxyCipherSuite directives above with.
	</p>
	<h2>#</h2>
	<p>
		The following two directives, as soon as practical.
	</p>
	<h3>SSLCipherSuite HIGH:MEDIUM:!SSLv3:!kRSA.</h3>
	<h3>SSLProxyCipherSuite HIGH:MEDIUM:!SSLv3:!kRSA.</h3>
	<h2>#</h2>
	<p>
		User agents such as web browsers are not configured for the user's.
	</p>
	<h2>#</h2>
	<p>
		Own preference of either security or performance, therefore this.
	</p>
	<h2>#</h2>
	<p>
		Must be the prerogative of the web server administrator who manages.
	</p>
	<h2>#</h2>
	<p>
		Cpu load versus confidentiality, so enforce the server's cipher order.
	</p>
	<p>
		SSLHonorCipherOrder on.
	</p>
	<h2>#</h2>
	<p>
		SSL Protocol support:
	</p>
	<h2>#</h2>
	<p>
		List the protocol versions which clients are allowed to connect with.
	</p>
	<h2>#</h2>
	<p>
		Disable SSLv3 by default (cf. RFC 7525 3.1.1). TLSv1 (1.0) should be.
	</p>
	<h2>#</h2>
	<p>
		Disabled as quickly as practical. By the end of 2016, only the TLSv1.2.
	</p>
	<h2>#</h2>
	<p>
		Protocol or later should remain in use.
	</p>
	<pre class='indent-c'><code class='block'>SSLProtocol all -SSLv3</code></pre>
	<pre class='indent-c'><code class='block'>SSLProxyProtocol all -SSLv3</code></pre>
	<h2>#</h2>
	<p>
		Pass Phrase Dialog:
	</p>
	<h2>#</h2>
	<p>
		Configure the pass phrase gathering process.
	</p>
	<h2>#</h2>
	<p>
		The filtering dialog program (`builtin' is an internal.
	</p>
	<h2>#</h2>
	<p>
		Terminal dialog) has to provide the pass phrase on stdout.
	</p>
	<h2>SSLPassPhraseDialog</h2>
	<p>
		Builtin.
	</p>
	<h2>#</h2>
	<p>
		Inter-Process Session Cache:
	</p>
	<h2>#</h2>
	<p>
		Configure the SSL Session Cache: First the mechanism.
	</p>
	<h2>#</h2>
	<p>
		To use and second the expiring timeout (in seconds).
	</p>
	<pre class='indent-c'><code class='block'>#SSLSessionCache         "dbm:${SRVROOT}/logs/ssl_scache"</code></pre>
	<pre class='indent-c'><code class='block'>SSLSessionCache        "shmcb:${SRVROOT}/logs/ssl_scache(512000)"</code></pre>
	<h2>SSLSessionCacheTimeout</h2>
	<p>
		300.
	</p>
	<h2>#</h2>
	<p>
		OCSP Stapling (requires OpenSSL 0.9.8h or later).
	</p>
	<p>
		#.
	</p>
	<h2>#</h2>
	<p>
		This feature is disabled by default and requires at least.
	</p>
	<h2>#</h2>
	<p>
		The two directives SSLUseStapling and SSLStaplingCache.
	</p>
	<h2>#</h2>
	<p>
		Refer to the documentation on OCSP Stapling in the SSL/TLS.
	</p>
	<h2>#</h2>
	<p>
		How-To for more information.
	</p>
	<p>
		#.
	</p>
	<h2>#</h2>
	<p>
		Enable stapling for all SSL-enabled servers:
	</p>
	<p>
		#SSLUseStapling On.
	</p>
	<h2>#</h2>
	<p>
		Define a relatively small cache for OCSP Stapling using.
	</p>
	<h2>#</h2>
	<p>
		The same mechanism that is used for the SSL session cache.
	</p>
	<h2>#</h2>
	<p>
		Above. If stapling is used with more than a few certificates,.
	</p>
	<h2>#</h2>
	<p>
		The size may need to be increased. (AH01929 will be logged.).
	</p>
	<pre class='indent-c'><code class='block'>#SSLStaplingCache "shmcb:${SRVROOT}/logs/ssl_stapling(32768)"</code></pre>
	<h2>#</h2>
	<p>
		Seconds before valid OCSP responses are expired from the cache.
	</p>
	<p>
		#SSLStaplingStandardCacheTimeout 3600.
	</p>
	<h2>#</h2>
	<p>
		Seconds before invalid OCSP responses are expired from the cache.
	</p>
	<p>
		#SSLStaplingErrorCacheTimeout 600.
	</p>
	<p>
		##.
	</p>
	<h2>SSL Virtual Host Context.</h2>
	<p>
		##.
	</p>
	<pre class='indent-c'><code class='block'>&lt;VirtualHost _default_:443&gt;</code></pre>
	<h2>#</h2>
	<p>
		General setup for the virtual host.
	</p>
	<pre class='indent-c'><code class='block'>DocumentRoot "${DOCROOT}/htdocs"</code></pre>
	<p>
		ServerName localhost:443.
	</p>
	<p>
		ServerAdmin admin@example.com.
	</p>
	<pre class='indent-c'><code class='block'>ErrorLog "${DOCROOT}/logs/error.log"</code></pre>
	<pre class='indent-c'><code class='block'>TransferLog "${DOCROOT}/logs/access.log"</code></pre>
	<h2>#</h2>
	<p>
		SSL Engine Switch:
	</p>
	<h2>#</h2>
	<p>
		Enable/Disable SSL for this virtual host.
	</p>
	<p>
		SSLEngine on.
	</p>
	<h2>#</h2>
	<p>
		Server Certificate:
	</p>
	<h2>#</h2>
	<p>
		Point SSLCertificateFile at a PEM encoded certificate. If.
	</p>
	<h2>#</h2>
	<p>
		The certificate is encrypted, then you will be prompted for a.
	</p>
	<pre class='indent-c'><code class='block'>#   pass phrase.  Note that a kill -HUP will prompt again.  Keep</code></pre>
	<h2>#</h2>
	<p>
		In mind that if you have both an RSA and a DSA certificate you.
	</p>
	<h2>#</h2>
	<p>
		Can configure both in parallel (to also allow the use of DSA.
	</p>
	<h2>#</h2>
	<p>
		Ciphers, etc.).
	</p>
	<h2>#</h2>
	<p>
		Some ECC cipher suites (http://www.ietf.org/rfc/rfc4492.txt).
	</p>
	<h2>#</h2>
	<p>
		Require an ECC certificate which can also be configured in.
	</p>
	<h2>#</h2>
	<p>
		Parallel.
	</p>
	<pre class='indent-c'><code class='block'>SSLCertificateFile "${SRVROOT}/conf/server.crt"</code></pre>
	<pre class='indent-c'><code class='block'>#SSLCertificateFile "${SRVROOT}/conf/server-dsa.crt"</code></pre>
	<pre class='indent-c'><code class='block'>#SSLCertificateFile "${SRVROOT}/conf/server-ecc.crt"</code></pre>
	<h2>#</h2>
	<p>
		Server Private Key:
	</p>
	<h2>#</h2>
	<p>
		If the key is not combined with the certificate, use this.
	</p>
	<h2>#</h2>
	<p>
		Directive to point at the key file. Keep in mind that if.
	</p>
	<h2>#</h2>
	<p>
		You've both a RSA and a DSA private key you can configure.
	</p>
	<h2>#</h2>
	<p>
		Both in parallel (to also allow the use of DSA ciphers, etc.).
	</p>
	<h2>#</h2>
	<p>
		ECC keys, when in use, can also be configured in parallel.
	</p>
	<pre class='indent-c'><code class='block'>SSLCertificateKeyFile "${SRVROOT}/conf/server.key"</code></pre>
	<pre class='indent-c'><code class='block'>#SSLCertificateKeyFile "${SRVROOT}/conf/server-dsa.key"</code></pre>
	<pre class='indent-c'><code class='block'>#SSLCertificateKeyFile "${SRVROOT}/conf/server-ecc.key"</code></pre>
	<h2>#</h2>
	<p>
		Server Certificate Chain:
	</p>
	<h2>#</h2>
	<p>
		Point SSLCertificateChainFile at a file containing the.
	</p>
	<h2>#</h2>
	<p>
		Concatenation of PEM encoded CA certificates which form the.
	</p>
	<h2>#</h2>
	<p>
		Certificate chain for the server certificate. Alternatively.
	</p>
	<h2>#</h2>
	<p>
		The referenced file can be the same as SSLCertificateFile.
	</p>
	<h2>#</h2>
	<p>
		When the CA certificates are directly appended to the server.
	</p>
	<h2>#</h2>
	<p>
		Certificate for convenience.
	</p>
	<pre class='indent-c'><code class='block'>#SSLCertificateChainFile "${SRVROOT}/conf/server-ca.crt"</code></pre>
	<h2>#</h2>
	<p>
		Certificate Authority (CA):
	</p>
	<h2>#</h2>
	<p>
		Set the CA certificate verification path where to find CA.
	</p>
	<h2>#</h2>
	<p>
		Certificates for client authentication or alternatively one.
	</p>
	<h2>#</h2>
	<p>
		Huge file containing all of them (file must be PEM encoded).
	</p>
	<h2>#</h2>
	<p>
		Note: Inside SSLCACertificatePath you need hash symlinks.
	</p>
	<h2>#</h2>
	<p>
		To point to the certificate files. Use the provided.
	</p>
	<h2>#</h2>
	<p>
		Makefile to update the hash symlinks after changes.
	</p>
	<pre class='indent-c'><code class='block'>#SSLCACertificatePath "${SRVROOT}/conf/ssl.crt"</code></pre>
	<pre class='indent-c'><code class='block'>#SSLCACertificateFile "${SRVROOT}/conf/ssl.crt/ca-bundle.crt"</code></pre>
	<h2>#</h2>
	<p>
		Certificate Revocation Lists (CRL):
	</p>
	<h2>#</h2>
	<p>
		Set the CA revocation path where to find CA CRLs for client.
	</p>
	<h2>#</h2>
	<p>
		Authentication or alternatively one huge file containing all.
	</p>
	<h2>#</h2>
	<p>
		Of them (file must be PEM encoded).
	</p>
	<h2>#</h2>
	<p>
		The CRL checking mode needs to be configured explicitly.
	</p>
	<h2>#</h2>
	<p>
		Through SSLCARevocationCheck (defaults to "none" otherwise).
	</p>
	<h2>#</h2>
	<p>
		Note: Inside SSLCARevocationPath you need hash symlinks.
	</p>
	<h2>#</h2>
	<p>
		To point to the certificate files. Use the provided.
	</p>
	<h2>#</h2>
	<p>
		Makefile to update the hash symlinks after changes.
	</p>
	<pre class='indent-c'><code class='block'>#SSLCARevocationPath "${SRVROOT}/conf/ssl.crl"</code></pre>
	<pre class='indent-c'><code class='block'>#SSLCARevocationFile "${SRVROOT}/conf/ssl.crl/ca-bundle.crl"</code></pre>
	<p>
		#SSLCARevocationCheck chain.
	</p>
	<h2>#</h2>
	<p>
		Client Authentication (Type):
	</p>
	<h2>#</h2>
	<p>
		Client certificate verification type and depth. Types are.
	</p>
	<h2>#</h2>
	<p>
		None, optional, require and optional_no_ca. Depth is a.
	</p>
	<h2>#</h2>
	<p>
		Number which specifies how deeply to verify the certificate.
	</p>
	<h2>#</h2>
	<p>
		Issuer chain before deciding the certificate is not valid.
	</p>
	<p>
		#SSLVerifyClient require.
	</p>
	<h2>#SSLVerifyDepth</h2>
	<p>
		10.
	</p>
	<h2>#</h2>
	<p>
		TLS-SRP mutual authentication:
	</p>
	<h2>#</h2>
	<p>
		Enable TLS-SRP and set the path to the OpenSSL SRP verifier.
	</p>
	<h2>#</h2>
	<p>
		File (containing login information for SRP user accounts).
	</p>
	<h2>#</h2>
	<p>
		Requires OpenSSL 1.0.1 or newer. See the mod_ssl FAQ for.
	</p>
	<h2>#</h2>
	<p>
		Detailed instructions on creating this file. Example:
	</p>
	<pre class='indent-c'><code class='block'>#   "openssl srp -srpvfile ${SRVROOT}/conf/passwd.srpv -add username"</code></pre>
	<pre class='indent-c'><code class='block'>#SSLSRPVerifierFile "${SRVROOT}/conf/passwd.srpv"</code></pre>
	<h2>#</h2>
	<p>
		Access Control:
	</p>
	<h2>#</h2>
	<p>
		With SSLRequire you can do per-directory access control based.
	</p>
	<h2>#</h2>
	<p>
		On arbitrary complex boolean expressions containing server.
	</p>
	<h2>#</h2>
	<p>
		Variable checks and other lookup directives. The syntax is a.
	</p>
	<h2>#</h2>
	<p>
		Mixture between C and Perl. See the mod_ssl documentation.
	</p>
	<h2>#</h2>
	<p>
		For more details.
	</p>
	<pre class='indent-c'><code class='block'>#&lt;Location /&gt;</code></pre>
	<h2>#SSLRequire (</h2>
	<p>
		%{SSL_CIPHER} !~ m/^(EXP|NULL)/ \
	</p>
	<h2>#</h2>
	<p>
		And %{SSL_CLIENT_S_DN_O} eq "Snake Oil, Ltd." \.
	</p>
	<h2>#</h2>
	<p>
		And %{SSL_CLIENT_S_DN_OU} in {"Staff", "CA", "Dev"} \.
	</p>
	<pre class='indent-c'><code class='block'>#&lt;Location #            and %{TIME_WDAY} &gt;= 1 and %{TIME_WDAY} &lt;= 5 \</code></pre>
	<pre class='indent-c'><code class='block'># #            and %{TIME_HOUR} &gt;= 8 and %{TIME_HOUR} &lt;= 20       ) \</code></pre>
	<h2>#</h2>
	<p>
		Or %{REMOTE_ADDR} =~ m/^192\.76\.162\.[0-9]+$/.
	</p>
	<pre class='indent-c'><code class='block'># #&lt;/Location&gt;</code></pre>
	<h2>#</h2>
	<p>
		SSL Engine Options:
	</p>
	<h2>#</h2>
	<p>
		Set various options for the SSL engine.
	</p>
	<h2>#</h2>
	<p>
		O FakeBasicAuth:
	</p>
	<h2>#</h2>
	<p>
		Translate the client X.509 into a Basic Authorisation. This means that.
	</p>
	<h2>#</h2>
	<p>
		The standard Auth/DBMAuth methods can be used for access control. The.
	</p>
	<h2>#</h2>
	<p>
		User name is the `one line' version of the client's X.509 certificate.
	</p>
	<h2>#</h2>
	<p>
		Note that no password is obtained from the user. Every entry in the user.
	</p>
	<h2>#</h2>
	<p>
		File needs this password: `xxj31ZMTZzkVA'.
	</p>
	<h2>#</h2>
	<p>
		O ExportCertData:
	</p>
	<h2>#</h2>
	<p>
		This exports two additional environment variables: SSL_CLIENT_CERT and.
	</p>
	<h2>#</h2>
	<p>
		SSL_SERVER_CERT. These contain the PEM-encoded certificates of the.
	</p>
	<h2>#</h2>
	<p>
		Server (always existing) and the client (only existing when client.
	</p>
	<h2>#</h2>
	<p>
		Authentication is used). This can be used to import the certificates.
	</p>
	<h2>#</h2>
	<p>
		Into CGI scripts.
	</p>
	<h2>#</h2>
	<p>
		O StdEnvVars:
	</p>
	<h2>#</h2>
	<p>
		This exports the standard SSL/TLS related `SSL_*' environment variables.
	</p>
	<h2>#</h2>
	<p>
		Per default this exportation is switched off for performance reasons,.
	</p>
	<h2>#</h2>
	<p>
		Because the extraction step is an expensive operation and is usually.
	</p>
	<h2>#</h2>
	<p>
		Useless for serving static content. So one usually enables the.
	</p>
	<h2>#</h2>
	<p>
		Exportation for CGI and SSI requests only.
	</p>
	<h2>#</h2>
	<p>
		O StrictRequire:
	</p>
	<h2>#</h2>
	<p>
		This denies access when "SSLRequireSSL" or "SSLRequire" applied even.
	</p>
	<h2>#</h2>
	<p>
		Under a "Satisfy any" situation, i.e. when it applies access is denied.
	</p>
	<h2>#</h2>
	<p>
		And no other module can change it.
	</p>
	<h2>#</h2>
	<p>
		O OptRenegotiate:
	</p>
	<h2>#</h2>
	<p>
		This enables optimized SSL connection renegotiation handling when SSL.
	</p>
	<h2>#</h2>
	<p>
		Directives are used in per-directory context.
	</p>
	<p>
		#SSLOptions +FakeBasicAuth +ExportCertData +StrictRequire.
	</p>
	<pre class='indent-c'><code class='block'>&lt;FilesMatch "\.(cgi|shtml|phtml|php)$"&gt;</code></pre>
	<p>
		SSLOptions +StdEnvVars.
	</p>
	<pre class='indent-c'><code class='block'>&lt;FilesMatch &lt;/FilesMatch&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;/FilesMatch&gt; &lt;Directory "${SRVROOT}/cgi-bin"&gt;</code></pre>
	<p>
		SSLOptions +StdEnvVars.
	</p>
	<pre class='indent-c'><code class='block'>&lt;Directory &lt;/Directory&gt;</code></pre>
	<h2>#</h2>
	<p>
		SSL Protocol Adjustments:
	</p>
	<h2>#</h2>
	<p>
		The safe and default but still SSL/TLS standard compliant shutdown.
	</p>
	<h2>#</h2>
	<p>
		Approach is that mod_ssl sends the close notify alert but doesn't wait for.
	</p>
	<h2>#</h2>
	<p>
		The close notify alert from client. When you need a different shutdown.
	</p>
	<h2>#</h2>
	<p>
		Approach you can use one of the following variables:
	</p>
	<h2>#</h2>
	<p>
		O ssl-unclean-shutdown:
	</p>
	<h2>#</h2>
	<p>
		This forces an unclean shutdown when the connection is closed, i.e. no.
	</p>
	<h2>#</h2>
	<p>
		SSL close notify alert is sent or allowed to be received. This violates.
	</p>
	<h2>#</h2>
	<p>
		The SSL/TLS standard but is needed for some brain-dead browsers. Use.
	</p>
	<h2>#</h2>
	<p>
		This when you receive I/O errors because of the standard approach where.
	</p>
	<h2>#</h2>
	<p>
		Mod_ssl sends the close notify alert.
	</p>
	<h2>#</h2>
	<p>
		O ssl-accurate-shutdown:
	</p>
	<h2>#</h2>
	<p>
		This forces an accurate shutdown when the connection is closed, i.e. a.
	</p>
	<h2>#</h2>
	<p>
		SSL close notify alert is send and mod_ssl waits for the close notify.
	</p>
	<h2>#</h2>
	<p>
		Alert of the client. This is 100% SSL/TLS standard compliant, but in.
	</p>
	<h2>#</h2>
	<p>
		Practice often causes hanging connections with brain-dead browsers. Use.
	</p>
	<h2>#</h2>
	<p>
		This only for browsers where you know that their SSL implementation.
	</p>
	<h2>#</h2>
	<p>
		Works correctly.
	</p>
	<h2>#</h2>
	<p>
		Notice: Most problems of broken clients are also related to the HTTP.
	</p>
	<h2>#</h2>
	<p>
		keep-alive facility, so you usually additionally want to disable
	</p>
	<h2>#</h2>
	<p>
		Keep-alive for those clients, too. Use variable "nokeepalive" for this.
	</p>
	<h2>#</h2>
	<p>
		Similarly, one has to force some clients to use HTTP/1.0 to workaround.
	</p>
	<h2>#</h2>
	<p>
		Their broken HTTP/1.1 implementation. Use variables "downgrade-1.0" and.
	</p>
	<h2>#</h2>
	<p>
		"force-response-1.0" for this.
	</p>
	<h2>BrowserMatch "MSIE [2-5]" \</h2>
	<p>
		Nokeepalive ssl-unclean-shutdown \.
	</p>
	<p>
		Downgrade-1.0 force-response-1.0.
	</p>
	<h2>#</h2>
	<p>
		Per-Server Logging:
	</p>
	<h2>#</h2>
	<p>
		The home of a custom SSL log file. Use this when you want a.
	</p>
	<h2>#</h2>
	<p>
		Compact non-error SSL logfile on a virtual host basis.
	</p>
	<pre class='indent-c'><code class='block'>CustomLog "${SRVROOT}/logs/ssl_request.log" \</code></pre>
	<p>
		"%t %h %{SSL_PROTOCOL}x %{SSL_CIPHER}x \"%r\" %b".
	</p>
	<pre class='indent-c'><code class='block'>&lt;/VirtualHost&gt;</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
