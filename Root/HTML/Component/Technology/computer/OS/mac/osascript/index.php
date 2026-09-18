<div id='message'>
	<p>
		<code class='inline'>$1</code> is the color, as a four-value tuple:
	</p>
	<pre class='indent-c'><code class='block'>$1 = "{0, 17655, 0, 50000}"</code></pre>
	<p>
		Set the background color of Terminal window 1:
	</p>
	<pre class='indent-c'><code class='block'>osascript -e "tell application \"Terminal\" to set background color of window 1 to $1"</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
