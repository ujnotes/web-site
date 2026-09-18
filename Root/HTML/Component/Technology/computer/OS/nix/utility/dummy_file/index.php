<div id='message'>
	<p>
		Create a dummy file of repeated lines with yes and head, or random bytes from /dev/urandom.
	</p>
	<pre class='indent-c'><code class='block'>yes &lt;text&gt; | head -&lt;no of lines&gt; &gt; &lt;output file&gt;</code></pre>
	<p>
		Example:
	</p>
	<pre class='indent-c'><code class='block'>yes 123456789 | head -10000 &gt; dummy.file</code></pre>
	<p>
		Linefeed adds one byte each.
	</p>
	<pre class='indent-c'><code class='block'>head -c 100000 /dev/urandom &gt; dummy</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
