<div id='message'>
	<p>
		Httpd.conf.
	</p>
	<p>
		LoadModule rewrite_module modules/mod_rewrite.so.
	</p>
	<pre class='indent-c'><code class='block'>&lt;Directory&gt;</code></pre>
	<p>
		Options FollowSymLinks.
	</p>
	<p>
		AllowOverride None.
	</p>
	<pre class='indent-c'><code class='block'>&lt;/Directory&gt;</code></pre>
	<p>
		Rename .htaccess.
	</p>
	<p>
		AccessFileName [filename].
	</p>
	<p>
		.htaccess.
	</p>
	<h2>Turn on rewrite engine</h2>
	<p>
		RewriteEngine On.
	</p>
	<p>
		RewriteBase /.
	</p>
	<h2>ForceType</h2>
	<p>
		Application/x-httpd-html.
	</p>
	<h2>DefaultType</h2>
	<p>
		Text/html.
	</p>
	<ul class="list-bullet content-list">
		<li><div>Non Extension files.</div></li>
	</ul>
	<h2>ErrorDocument</h2>
	<p>
		404.
	</p>
	<pre class='indent-c'><code class='block'>/&lt;path from documentRoot&gt;</code></pre>
	<pre class='indent-c'><code class='block'>url &lt;http://_&gt;</code></pre>
	<pre class='indent-c'><code class='block'>url "&lt;string&gt;"</code></pre>
	<p>
		(default).
	</p>
	<h2>Redirect 404 /</h2>
	<p>
		Redirects 404 errors to page.
	</p>
	<h2>Default file</h2>
	<pre class='indent-c'><code class='block'>Default file DirectoryIndex &lt;path&gt;</code></pre>
	<h2>Variables</h2>
	<pre class='indent-c'><code class='block'>%{QUERY_STRING}</code></pre>
	<pre class='indent-c'><code class='block'>%{REQUEST_FILENAME}</code></pre>
	<p>
		Path of the file invoked to serve the request.
	</p>
	<pre class='indent-c'><code class='block'>%{DOCUMENT_ROOT}</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
