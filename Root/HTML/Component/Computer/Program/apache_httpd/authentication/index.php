<div id='message'>
	<ol class="list-number content-list">
		<li><div>Create user &amp; password.</div></li>
	</ol>
	<pre class='indent-c'><code class='block'>&lt;Directory "/var/www/html/protected"&gt;</code></pre>
	<p>
		AllowOverride AuthConfig.
	</p>
	<h3>The Options below is an example. Use what you deem is necessary.</h3>
	<p>
		Options MultiViews Indexes SymLinksIfOwnerMatch IncludesNoExec.
	</p>
	<p>
		Order allow,deny.
	</p>
	<p>
		Allow from all.
	</p>
	<pre class='indent-c'><code class='block'>&lt;Directory &lt;/Directory&gt;</code></pre>
	<p>
		Multiple dirs allowed.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
