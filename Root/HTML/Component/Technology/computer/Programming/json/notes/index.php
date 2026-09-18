<div id='message'>
	<h2>Array</h2>
	<pre class='indent-c'><code class='block'>\[ ”&lt;Value&gt;” [...] \]</code></pre>
	<h2>ex.</h2>
	<p>
		[“value1”, “value2”].
	</p>
	<h2>Java array to JSON</h2>
	<p>
		StringBuilder sb = new StringBuilder();.
	</p>
	<h2>for (String n : name) {</h2>
	<p>
		If (sb.length() &gt; 0) sb.append(',');.
	</p>
	<p>
		Sb.append("'").append(n).append("'");.
	</p>
	<p>
		}.
	</p>
	<p>
		Return sb.toString();.
	</p>
	<h2>ResponseText &gt; JSON</h2>
	<pre class='indent-c'><code class='block'>ResponseText &gt; JSON JSON.parse(&lt;JSON_String&gt;)</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
