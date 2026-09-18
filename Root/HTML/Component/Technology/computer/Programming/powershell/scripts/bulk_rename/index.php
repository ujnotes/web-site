<div id='message'>
	<p>
		Bulk rename: $args | Rename-Item -NewName { $_.Name.ToLower() -.
	</p>
	<pre class='indent-c'><code class='block'>$args | Rename-Item -NewName { $_.Name.ToLower() -replace '\d+ - ' }</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
