<div id='message'>
	<p>
		https://github.com/certbot/certbot
	</p>
	<p>
		Obtains and installs SSL certificate from Letsencrypt.
	</p>
	<h2>Primary domain (CN)</h2>
	<pre class='indent-c'><code class='block'>Primary domain (CN) First -d &lt;primary-domain&gt;</code></pre>
	<pre class='indent-c'><code class='block'>/etc/letsencrypt/</code></pre>
	<pre class='indent-c'><code class='block'>live/&lt;cert-directory&gt;/&lt;cert-files&gt; sym-link ../archive/&lt;cert-directory&gt;/&lt;index&gt;/</code></pre>
	<p>
		Files hare are full chain.
	</p>
	<p>
		Can be used to create standalone.
	</p>
	<p>
		Renew.
	</p>
	<h2>renew</h2>
	<pre class='indent-c'><code class='block'>renew --dry-run</code></pre>
	<h2>Try to renew</h2>
	<pre class='indent-c'><code class='block'>Try to renew --pre-hook &lt;&gt;</code></pre>
	<pre class='indent-c'><code class='block'>Try to renew --post-hook &lt;&gt;</code></pre>
	<p>
		Run only it renew attempted.
	</p>
	<h2>Apache</h2>
	<pre class='indent-c'><code class='block'>Apache certbot-auto --apache -d &lt;primary&gt; [-d &lt;secondary&gt;]...</code></pre>
	<p>
		Tomcat.
	</p>
	<pre class='indent-c'><code class='block'>openssl pkcs12 -export -in fullchain.pem -inkey privkey.pem -CAfile chain.pem -caname root -out fullchain_and_key.p12 -name tomcat</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
