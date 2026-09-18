<div id='message'>
	<ol class="list-number content-list">
		<li><div>Install cf tunnel.</div></li>
	</ol>
	<pre class='indent-c'><code class='block'>winget install --id Cloudflare.cloudflared</code></pre>
	<ol class="list-number content-list">
		<li><div>login.</div></li>
	</ol>
	<p>
		Cloudflared tunnel login.
	</p>
	<ol class="list-number content-list">
		<li><div>create tunnel.</div></li>
	</ol>
	<pre class='indent-c'><code class='block'>cloudflared tunnel create &lt;tunnel&gt;</code></pre>
	<p>
		This will create a tunnel with a uuid.
	</p>
	<pre class='indent-c'><code class='block'>%user_profile%\.cloudflared</code></pre>
	<p>
		Cert.pem.
	</p>
	<pre class='indent-c'><code class='block'>&lt;uuid&gt;.json</code></pre>
	<h2>4. add config.yml</h2>
	<p>
		@ ^.
	</p>
	<pre class='indent-c'><code class='block'>4. add config.yml tunnel: &lt;tunnel&gt;</code></pre>
	<pre class='indent-c'><code class='block'>credentials-file: \.cloudflared\&lt;uuid&gt;.json</code></pre>
	<h2>ingress</h2>
	<pre class='indent-c'><code class='block'>- hostname: &lt;sub.domain.tld&gt;</code></pre>
	<pre class='indent-c'><code class='block'>service: http[s]://localhost:&lt;port&gt;</code></pre>
	<p>
		<strong>- service.</strong> Http_status:404.
	</p>
	<ol class="list-number content-list">
		<li><div>start.</div></li>
	</ol>
	<pre class='indent-c'><code class='block'>cloudflared tunnel run &lt;tunnel&gt;</code></pre>
	<ol class="list-number content-list">
		<li><div>service.</div></li>
	</ol>
	<p>
		Cloudflared service install.
	</p>
	<ol class="list-number content-list">
		<li><div>debug.</div></li>
	</ol>
	<pre class='indent-c'><code class='block'>cloudflared tunnel run &lt;tunnel&gt; --loglevel debug</code></pre>
	<ol class="list-number content-list">
		<li><div>Allow firewall.</div></li>
	</ol>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
