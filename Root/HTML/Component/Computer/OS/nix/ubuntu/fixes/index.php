<div id='message'>
	<h2>apt-get corrupted</h2>
	<pre class='indent-c'><code class='block'>sudo rm /var/lib/apt/lists/* -vf
sudo apt-get update</code></pre>
	<p>
		Caution: this deletes files under <code class='inline'>/var/lib/apt/lists/</code>.
	</p>
	<h2>Source select</h2>
	<p>
		Software_, first tab. Useful when the steps above do not resolve.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
