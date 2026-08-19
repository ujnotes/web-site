<div id='message'>
	<h2>CRLF to LF</h2>
	<p>
		Old.
	</p>
	<pre class='indent-c'><code class='block'>CRLF to LF sed -i 's/.$//' &lt;file&gt;</code></pre>
	<h2>Current - recursive</h2>
	<pre class='indent-c'><code class='block'>find . -type f -exec sed -i 's/\r/\n/g; s/\n$//' {} +</code></pre>
	<p>
		Last replace removes extra LF added by sed.
	</p>
	<p>
		https://stackoverflow.com/a/42914886/483588
	</p>
	<h2>LF to CRLF</h2>
	<pre class='indent-c'><code class='block'>LF to CRLF sed -i "s/$/`echo -e \\\r`/" &lt;file&gt;</code></pre>
	<p>
		Recursive.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
