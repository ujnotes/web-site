<div id='message'>
		<?php $alt='Caddy reverse proxy running on Windows'; require('../HTML/Fragment/Component_cover.php') ?>
	<h2 class='center'><?php echo $desc; ?></h2>
	<h3>What is this setup for?</h3>
	<p>
		Caddy can provide HTTPS in front of a local app. It accepts requests at https://localhost and passes them to an app on localhost:3000.
	</p>
	<h3>Install Caddy</h3>
	<p>
		Download the Windows archive from the official Caddy download page, extract caddy.exe, and keep it with its configuration in C:\programs\Caddy. Add that folder to PATH if you want to run caddy from any terminal.
	</p>
	<p>
		Open PowerShell as Administrator for the first setup. Administrator access is needed to install Caddy’s local HTTPS root certificate and may be needed if Windows blocks ports 80 or 443.
	</p>
	<h3>Create the Caddyfile</h3>
	<p>
		Create C:\programs\Caddy\caddyfile with this content:
	</p>
	<pre class='indent-c'><code class='block'>localhost {
    reverse_proxy localhost:3000
}</code></pre>
	<p>
		Validate it before starting Caddy:
	</p>
	<pre class='indent-c'><code class='block'>C:\programs\Caddy\caddy.exe validate --config C:\programs\Caddy\caddyfile --adapter caddyfile</code></pre>
	<h3>Start and trust local HTTPS</h3>
	<p>
		Run Caddy in the same elevated PowerShell window:
	</p>
	<pre class='indent-c'><code class='block'>C:\programs\Caddy\caddy.exe run --config C:\programs\Caddy\caddyfile --adapter caddyfile</code></pre>
	<p>
		On the first run, Caddy creates a local certificate authority. If its trust prompt was missed or failed, stop Caddy and run:
	</p>
	<pre class='indent-c'><code class='block'>C:\programs\Caddy\caddy.exe trust</code></pre>
	<p>
		Open https://localhost after restarting Caddy. Firefox may need the Caddy root certificate imported separately because it can use its own certificate store.
	</p>
	<h3>Run it after sign-in</h3>
	<p>
		For a development machine, create a Task Scheduler task that runs at sign-in with the same caddy.exe run command. Use a Windows service wrapper only when Caddy must start before anyone signs in; make sure that service account can read the Caddyfile and store its certificates.
	</p>
	<h3>Reload and test</h3>
	<pre class='indent-c'><code class='block'>C:\programs\Caddy\caddy.exe reload --config C:\programs\Caddy\caddyfile --adapter caddyfile
curl.exe -I http://localhost
curl.exe -I https://localhost</code></pre>
	<p>
		Caddy redirects HTTP to HTTPS for localhost. If another program already uses port 80 or 443, stop it or choose another address and port.
	</p>
	<h3>Use one shared setup for several domains</h3>
	<p>
		A named Caddy snippet keeps shared settings together. Each site imports it and supplies its own upstream port:
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
		Names ending in .localhost use local HTTPS. A public domain needs DNS pointing at the Windows machine and reachable ports 80 and 443.
	</p>
	<h3>Related</h3>
	<p>
		See <a class="content-link XURL" href="/computer/program/caddy/setup_mac" data-target="computer/program/caddy/setup_mac" data-title="Caddy setup on macOS">Caddy setup on macOS</a> for the Homebrew equivalent, and <a class="content-link XURL" href="/computer/program/apache_httpd/reverse_proxy" data-target="computer/program/apache_httpd/reverse_proxy" data-title="Apache HTTPD reverse proxy notes">Apache HTTPD reverse proxy notes</a> for the general reverse-proxy idea.
	</p>
	<div id='content-body-separator' class='center'></div>
	<p>
		<em>Ai disclosure: written with the help of AI (ChatGPT). You are encouraged to point out errors and omissions.</em>
	</p>

</div>
<?php require('../HTML/Fragment/Component_bottom.php') ?>