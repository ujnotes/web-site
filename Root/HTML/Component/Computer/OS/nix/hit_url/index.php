<div id='message'>
	<p>
		Hit a URL without <code class='inline'>wget</code> and <code class='inline'>curl</code>.
	</p>
	<pre class='indent-c'><code class='block'>http://localhost:9005/?code=
http://localhost:9005/?code=</code></pre>
	<h2>netcat</h2>
	<pre class='indent-c'><code class='block'>echo -e "GET / HTTP/1.1\r\nHost: example.com\r\nConnection: close\r\n\r\n" | nc localhost 9005</code></pre>
	<p>
		With a query string:
	</p>
	<pre class='indent-c'><code class='block'>echo -e "GET /?code= HTTP/1.1\r\nHost: localhost:9005\r\nConnection: close\r\n\r\n" | nc localhost 9005</code></pre>
	<h2>bash /dev/tcp</h2>
	<pre class='indent-c'><code class='block'>exec 3&lt;&gt;/dev/tcp/localhost/9005
echo -e "GET /?code= HTTP/1.1\r\nHost: localhost:9005\r\nConnection: close\r\n\r\n" &gt;&amp;3
cat &lt;&amp;3
exec 3&lt;&amp;-
exec 3&gt;&amp;-</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
