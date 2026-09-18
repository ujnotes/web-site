<div id='message'>
	<p>
		Tab 1.
	</p>
	<h2>1. join org account</h2>
	<ol class="list-number content-list">
		<li><div>- may be required to authorize account by signing up with credit card even when joining an already authorized main account.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>( 5$ - may be refunded).</div></li>
	</ol>
	<h2>2. two ways to init</h2>
	<ol class="list-number content-list">
		<li><div>command line.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>github connector.</div></li>
	</ol>
	<h2>3. command line tool</h2>
	<ol class="list-number content-list">
		<li><div>install flyctl.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>https://fly.io/docs/flyctl/install.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>fly machine · Fly Docs.</div></li>
	</ol>
	<h2>4. login</h2>
	<ol class="list-number content-list">
		<li><div>flyctl auth login (activate the correct browser window prior or copy link).</div></li>
	</ol>
	<h2>5. create app</h2>
	<ol class="list-number content-list">
		<li><div>flyctl launch.</div></li>
	</ol>
	<pre class='indent-c'><code class='block'>2. fly launch --org &lt;organization-id&gt;</code></pre>
	<h4>3. Config file</h4>
	<ol class="list-number content-list">
		<li><div>fly.toml.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>org cannot be specified here.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>6. scale.</div></li>
	</ol>
	<h4>1. Specify number of machines (additional can be suspended - reducing billing)</h4>
	<ol class="list-number content-list">
		<li><div>fly scale count 1.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>suspended cpu &amp; ram is not billed.</div></li>
	</ol>
	<h4>3. RootFS is billed at (only when suspended - not while running where it is covered by normal charge)</h4>
	<ol class="list-number content-list">
		<li><div>$0.15 per GB per month for used RootFS storage, prorated by time.</div></li>
	</ol>
	<h4>4. region</h4>
	<ol class="list-number content-list">
		<li><div>you can have parallel servers in different regions closer to user.</div></li>
	</ol>
	<h2>7. deploy</h2>
	<ol class="list-number content-list">
		<li><div>deploy.</div></li>
	</ol>
	<h4>2. redeply</h4>
	<pre class='indent-c'><code class='block'>2. redeply 1. fly deploy --image registry.fly.io/&lt;prveious_image_id&gt;</code></pre>
	<h4>3. config only</h4>
	<pre class='indent-c'><code class='block'>3. config only 1. fly deploy --config fly.toml --image registry.fly.io/&lt;app_name&gt;:deployment-__</code></pre>
	<h4>4. without depot</h4>
	<pre class='indent-c'><code class='block'>1. fly deploy --depot=false</code></pre>
	<h2>8. Status</h2>
	<h4>1. fly status</h4>
	<ol class="list-number content-list">
		<li><div>shows image &amp; machines table.</div></li>
	</ol>
	<h2>9. Image</h2>
	<ol class="list-number content-list">
		<li><div>fly image show.</div></li>
	</ol>
	<h2>10. Config</h2>
	<h4>1. fly config show</h4>
	<ol class="list-number content-list">
		<li><div>shows detailed - including config json (NOT yaml as .toml).</div></li>
	</ol>
	<h4>2. fly config save</h4>
	<ol class="list-number content-list">
		<li><div>save current config to fly.toml.</div></li>
	</ol>
	<h2>11. Custom domain</h2>
	<h4>1. add dns records</h4>
	<ol class="list-number content-list">
		<li><div>A record (ipv4) shared and AAAA (ipv6) record.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>the AAAA record is used by fly.io to connect to your app.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>CNAME is the alternate route.</div></li>
	</ol>
	<h2>12. SSL</h2>
	<pre class='indent-c'><code class='block'>12. SSL 4. fly certs add &lt;domain&gt;</code></pre>
	<ol class="list-number content-list">
		<li><div>go to the certificate tab of the page.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>create certificate for the domain/subdomain.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>use wild card only when necessary.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>add acme_challenge dns record for certificate issuance.</div></li>
	</ol>
	<h2>13. CDN</h2>
	<ol class="list-number content-list">
		<li><div>https://fly.io/docs/networking/understanding-cloudflare.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>disable cloudflare proxy till the issuance of the certificate.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>if using cloudflare proxy - delete A record as it conflicts, keep only AAAA record with strict https.</div></li>
	</ol>
	<h2>14. Scale</h2>
	<pre class='indent-c'><code class='block'>14. Scale 1. fly scale count &lt;n_machines&gt; –region &lt;region_code&gt;</code></pre>
	<ol class="list-number content-list">
		<li><div>https://fly.io/docs/reference/regions.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>CI/CD.</div></li>
	</ol>
	<pre class='indent-c'><code class='block'>
# See https://fly.io/docs/app-guides/continuous-deployment-with-github-actions/.

**name.** Fly Deploy.

## on

### push

### branches

- production.

## jobs

### deploy

**name.** Deploy app.

### runs-on
</code></pre>
	<p>
		ubuntu-latest
	</p>
	<pre class='indent-c'><code class='block'>
### concurrency: deploy-group

# optional: ensure only one action runs at a time.

### steps

**- uses.** Actions/checkout@v4.

### - name: create .env file

### run: |
</code></pre>
	<p>
		echo "NEXT_PUBLIC_API_URL=${{ vars.NEXT_PUBLIC_API_URL }}" &gt; .env
	</p>
	<pre class='indent-c'><code class='block'>
**- uses.** Superfly/flyctl-actions/setup-flyctl@master.
</code></pre>
	<ul class="list-bullet content-list">
		<li><div>run: flyctl deploy --remote-only</div></li>
	</ul>
	<pre class='indent-c'><code class='block'>
Env:
</code></pre>
	<p>
		FLY_API_TOKEN: ${{ secrets.FLY_API_TOKEN }}
	</p>
	<pre class='indent-c'><code class='block'>
3. Note that the env variables required at build time for docker build has to be passed as arg to the Dockerfile.

4. get api key from app page.

ARG NEXT_PUBLIC_API_URL.
</code></pre>
	<p>
		ENV NEXT_PUBLIC_API_URL=${NEXT_PUBLIC_API_URL}
	</p>
	<pre class='indent-c'><code class='block'>
# write Vite env file so the value is inlined into the client build.

RUN printf "NEXT_PUBLIC_API_URL=%s\n" "$NEXT_PUBLIC_API_URL" &gt; .env.production.

## 16. builder

### 1. the docker image is built of fly.io builder machines

1. this can be selected - capacity and region.

2. may have to be changed if no builder is found while deploying due to capacity exhaustion in the region.

## 17. suspend

1. suspended machines resume functioning within sub-second (to &lt; 3-5 seconds range) range - allowing https responses to complete.

2. this can be helpful to run to seldom used apps - to run at near zero cost, and be always available.

### 3. config

## [http_service]

Auto_stop_machines = 'suspend'.

Auto_start_machines = true.

Min_machines_running = 1.

# i.e. not suspended but actually running.

Processes = ['app'].

## 18. docker stage

1. specify which stage of the docker is to be served by.

2. in fly.toml.

## [build]
</code></pre>
	<p>
		build-target = "release"
	</p>
	<pre class='indent-c'><code class='block'>
## in Dockerfile

FROM base AS release.

## 19. capacity

Size = 'shared-cpu-1x'.

Memory = '512mb'.

Cpu_kind = 'shared'.

Cpus = 1.

Min memory is constrained to machine size.

And factored by no. of cpus.

## 20. monitoring

1. Manged grafana.

## 21. db

1. tunnel (for local connection - to say debug).

2. (better to keep of separate port than default).
</code></pre>
	<p>
		flyctl proxy 5433 -a
	</p>
	<pre class='indent-c'><code class='block'>
## 22. pricing

1. Fly.io Resource Pricing · Fly Docs.

## 23. issues

### 1. stuck machines

1. machines getting stuck - displayed ‘red’ for no apparent reason,.

**2. could be out of memory - TODO.** Need to investigate.

3. kill fixes, ?no way to auto restart?

## 24. Terminal

1. fly ssh console.

25. sftp.

## 26. fly ssh sftp shellogs

### 1.

Fly logs.

## 27. Restart
</code></pre>
	<ol class="list-number content-list">
		<li><div>Restart 1. flyctl machine kill &lt;machine_id&gt; [ -a app_name ]</div></li>
	</ol>
	<pre class='indent-c'><code class='block'>
1. works on stuck machines.
</code></pre>
	<ol class="list-number content-list">
		<li><div>Restart 2. flyctl machine &lt;start|stop|restart|kill&gt; &lt;machine_id&gt;</div></li>
	</ol>
	<pre class='indent-c'><code class='block'>
### 3. policy

1. https://fly.io/docs/machines/guides-examples/machine-restart-policy.

### 2. default

### 1. on-failure

Try up to 10 times to automatically restart the Machine if it exits with a non-zero exit code, before letting it stop.
</code></pre>
	<p>
		[[restart]].
	</p>
	<pre class='indent-c'><code class='block'>policy = "&lt;never | always | on-failure&gt;"</code></pre>
	<p>
		Retries = 10.
	</p>
	<p>
		Processes = ["app"].
	</p>
	<pre class='indent-c'><code class='block'>
## 28. Health Check

1. fly.io expects the web process be bound to 0.0.0.0.</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
