<div id='message'>
	<p>
		HTTP header sets an expiry duration.
	</p>
	<ol class="list-number content-list">
		<li><div>The client stores the data and expiry timestamp.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>stores must_revalidate flag.</div></li>
	</ol>
	<p>
		https://gtmetrix.com/add-expires-headers.html
	</p>
	<pre class='indent-c'><code class='block'>ExpiresByType &lt;mime type&gt; &lt;duration&gt;</code></pre>
	<p>
		http://stackoverflow.com/a/31685334/483588
	</p>
	<pre class='indent-c'><code class='block'>&lt;IfModule mod_expires.c&gt;</code></pre>
	<p>
		ExpiresActive on.
	</p>
	<p>
		ExpiresDefault "access plus 1 month".
	</p>
	<p>
		ExpiresByType image/gif "access plus 1 month".
	</p>
	<p>
		ExpiresByType image/png "access plus 1 month".
	</p>
	<p>
		ExpiresByType image/jpg "access plus 1 month".
	</p>
	<p>
		ExpiresByType image/jpeg "access plus 1 month".
	</p>
	<p>
		ExpiresByType text/html "access plus 3 days".
	</p>
	<p>
		ExpiresByType text/xml "access plus 1 seconds".
	</p>
	<p>
		ExpiresByType text/plain "access plus 1 seconds".
	</p>
	<p>
		ExpiresByType application/xml "access plus 1 seconds".
	</p>
	<p>
		ExpiresByType application/rss+xml "access plus 1 seconds".
	</p>
	<p>
		ExpiresByType application/json "access plus 1 seconds".
	</p>
	<p>
		ExpiresByType text/css "access plus 1 week".
	</p>
	<p>
		ExpiresByType text/javascript "access plus 1 week".
	</p>
	<p>
		ExpiresByType application/javascript "access plus 1 week".
	</p>
	<p>
		ExpiresByType application/x-javascript "access plus 1 week".
	</p>
	<p>
		ExpiresByType image/x-ico "access plus 1 year".
	</p>
	<p>
		ExpiresByType image/x-icon "access plus 1 year".
	</p>
	<p>
		ExpiresByType application/pdf "access plus 1 month".
	</p>
	<pre class='indent-c'><code class='block'>&lt;IfModule mod_headers.c&gt;</code></pre>
	<p>
		Header unset ETag.
	</p>
	<p>
		Header unset Pragma.
	</p>
	<p>
		Header unset Last-Modified.
	</p>
	<p>
		Header append Cache-Control "public, no-transform, must-revalidate".
	</p>
	<p>
		Header set Last-modified "Tue, 1 Oct 2014 10:10:10 GMT".
	</p>
	<pre class='indent-c'><code class='block'>&lt;IfModule &lt;/IfModule&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;IfModule &lt;/IfModule&gt;</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
