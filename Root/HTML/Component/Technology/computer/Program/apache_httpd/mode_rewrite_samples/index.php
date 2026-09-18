<div id='message'>
	<p>
		________________.
	</p>
	<h2>Remove Extension</h2>
	<p>
		RewriteCond %{REQUEST_FILENAME} !-d.
	</p>
	<pre class='indent-c'><code class='block'>RewriteCond %{REQUEST_FILENAME}\.html -f</code></pre>
	<p>
		RewriteRule ^(.*)$ $1.html.
	</p>
	<p>
		________________.
	</p>
	<h2>Redirect all</h2>
	<p>
		RewriteRule ^(.*)$ index.php.
	</p>
	<p>
		________________.
	</p>
	<p>
		Redirect to www.
	</p>
	<p>
		RewriteCond %{HTTP_HOST} ^1freehosting.com.
	</p>
	<p>
		RewriteRule (.*) http://www.1freehosting.com/$1 [R=301,L].
	</p>
	<p>
		________________.
	</p>
	<p>
		Redirect to naked.
	</p>
	<p>
		RewriteCond %{HTTP_HOST} !^mydomain\.com [NC].
	</p>
	<p>
		RewriteRule ^/?(.*)$ http://mydomain.com/$1 [L,R=301].
	</p>
	<p>
		________________.
	</p>
	<h2>Remove trailing slash</h2>
	<p>
		DirectorySlash Off.
	</p>
	<pre class='indent-c'><code class='block'>RewriteCond        %{REQUEST_FILENAME} -d</code></pre>
	<pre class='indent-c'><code class='block'>RewriteCond RewriteRule        ^(.)*$        $1/&lt;root.html&gt;        [L]</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
