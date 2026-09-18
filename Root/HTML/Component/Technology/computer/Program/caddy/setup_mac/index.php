<div id='message'>
		<?php $alt='Caddy reverse proxy running on a Mac'; require('../HTML/Fragment/Component_cover.php') ?>
	<h2 class='center'><?php echo $desc; ?></h2>
	<h3>What is this setup for?</h3>
	<p>
		Caddy can sit in front of a local app. It accepts requests at https://localhost and passes them to the app running at localhost:3000. This gives a local project HTTPS without making the app manage certificates itself.
	</p>
	<h3>Install Caddy</h3>
	<p>
		Install the Homebrew package:
	</p>
	<pre class='indent-c'><code class='block'>brew install caddy</code></pre>
	<p>
		Homebrew’s Caddyfile is $(brew --prefix)/etc/Caddyfile. That resolves to /opt/homebrew/etc/Caddyfile on Apple Silicon Macs and /usr/local/etc/Caddyfile on Intel Macs.
	</p>
	<h3>Add the reverse proxy</h3>
	<p>
		Create or edit that file:
	</p>
	<pre class='indent-c'><code class='block'>nano "$(brew --prefix)/etc/Caddyfile"</code></pre>
	<p>
		Use this Caddyfile:
	</p>
	<pre class='indent-c'><code class='block'>localhost {
	reverse_proxy localhost:3000
}</code></pre>
	<p>
		Start the app on port 3000, then check the Caddyfile before using it:
	</p>
	<pre class='indent-c'><code class='block'>caddy validate --config "$(brew --prefix)/etc/Caddyfile" --adapter caddyfile</code></pre>
	<h3>Reuse common configuration for several domains</h3>
	<p>
		A named snippet keeps shared settings in one place. Each site imports it and keeps only its own address and upstream port.
	</p>
	<pre class='indent-c'><code class='block'>(common_proxy) {
	encode zstd gzip
	reverse_proxy localhost:{args[0]}
}

app.localhost {
	import common_proxy 3000
}

api.localhost {
	import common_proxy 4000
}</code></pre>
	<p>
		Any hostname ending in <code class='inline'>.localhost</code> uses Caddy’s local HTTPS. Use a public domain only when its DNS points to this Mac and ports 80 and 443 are reachable from the internet.
	</p>
	<h3>Run Caddy as a service</h3>
	<p>
		Start it at login:
	</p>
	<pre class='indent-c'><code class='block'>brew services start caddy</code></pre>
	<p>
		After changing the Caddyfile, reload the running service:
	</p>
	<pre class='indent-c'><code class='block'>caddy reload --config "$(brew --prefix)/etc/Caddyfile" --adapter caddyfile</code></pre>
	<p>
		Useful service commands:
	</p>
	<pre class='indent-c'><code class='block'>brew services list
brew services restart caddy
brew services stop caddy
tail -f "$(brew --prefix)/var/log/caddy.log"</code></pre>
	<h3>Administrator access</h3>
	<p>
		You need an administrator password for <code class='inline'>sudo caddy trust</code>, which adds Caddy’s local root certificate to the macOS trust store. macOS may also require administrator help before Caddy can use ports 80 and 443. Do not run <code class='inline'>sudo brew services start caddy</code>: Homebrew services should run as your normal user.
	</p>
	<h3>Trust local HTTPS</h3>
	<p>
		A localhost site makes Caddy use its local certificate authority. Caddy normally offers to trust its root certificate on first use. If that did not happen, run:
	</p>
	<pre class='indent-c'><code class='block'>sudo caddy trust</code></pre>
	<p>
		Then open https://localhost. If a browser was already open when trust was added, restart it. Firefox may need the Caddy root certificate imported separately because it can use its own certificate store.
	</p>
	<h3>Test it</h3>
	<p>
		With the app and Caddy running, these should reach the proxied app:
	</p>
	<pre class='indent-c'><code class='block'>curl -I http://localhost
curl -I https://localhost</code></pre>
	<p>
		Caddy redirects HTTP to HTTPS for this hostname. If port 80 or 443 is already in use, stop the conflicting local server or choose a different site address and port.
	</p>
	<h3>Related</h3>
	<p>
		The same basic idea is described in <a class="content-link XURL" href="/computer/program/apache_httpd/reverse_proxy" data-target="computer/program/apache_httpd/reverse_proxy" data-title="Apache HTTPD reverse proxy notes">Apache HTTPD reverse proxy notes</a>. Caddy is placed under Programs because it is the server program being installed; reverse proxy is the networking role it performs.
	</p>
	<div id='content-body-separator' class='center'></div>
	<p>
		<em>Ai disclosure: written with the help of AI (ChatGPT). You are encouraged to point out errors and omissions.</em>
	</p>

</div>
<?php require('../HTML/Fragment/Component_bottom.php') ?>