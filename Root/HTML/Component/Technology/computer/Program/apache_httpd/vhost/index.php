<div id='message'>
	<h2>00-default</h2>
	<p>
		The first VHost is the default one.
	</p>
	<h2>append _ to disable</h2>
	<p>
		?for others?
	</p>
	<pre class='indent-c'><code class='block'>/etc/apache2/sites-available/</code></pre>
	<pre class='indent-c'><code class='block'>sites-available &gt; sites-enabled (symlink)</code></pre>
	<pre class='indent-c'><code class='block'>&lt;VirtualHost *:&lt;port&gt;&gt;</code></pre>
	<p>
		Note that though you can use domain name here - it actually effectively is an ip - hence for name based matching this should not be the domain name - and the interface ips instead.
	</p>
	<p>
		ServerAdmin.
	</p>
	<p>
		ServerName.
	</p>
	<p>
		Used for name based matching.
	</p>
	<p>
		ServerAlias.
	</p>
	<p>
		DocumentRoot.
	</p>
	<pre class='indent-c'><code class='block'>&lt;Directory&gt;</code></pre>
	<p>
		AllowOverride All.
	</p>
	<p>
		Order allow,deny.
	</p>
	<p>
		Allow from all.
	</p>
	<p>
		Require all granted.
	</p>
	<p>
		(only entry required for 2.4).
	</p>
	<pre class='indent-c'><code class='block'>&lt;Directory&gt; &lt;/Directory&gt;</code></pre>
	<h2>ErrorLog</h2>
	<pre class='indent-c'><code class='block'>ErrorLog CustomLog &lt;&gt; combined</code></pre>
	<pre class='indent-c'><code class='block'>&lt;/VirtualHost&gt;</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
