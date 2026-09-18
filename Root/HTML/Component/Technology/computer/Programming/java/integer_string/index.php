<div id='message'>
	<pre class='indent-c'><code class='block'>1. String.valueOf(&lt;number&gt;)</code></pre>
	<p>
		Preferred.
	</p>
	<pre class='indent-c'><code class='block'>2. "" + &lt;number&gt;</code></pre>
	<p>
		Don know how the compiler handles it, perhaps is as efficient as the above one.
	</p>
	<pre class='indent-c'><code class='block'>3. Integer.toString(&lt;number&gt;)</code></pre>
	<p>
		Could be useful as it can be overridden.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
