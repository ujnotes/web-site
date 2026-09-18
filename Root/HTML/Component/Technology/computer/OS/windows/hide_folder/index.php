<div id='message'>
	<h2>Recycle Bin CLSID</h2>
	<p>
		Rename the folder and redirect it to the Recycle Bin namespace by giving it this suffix:
	</p>
	<pre class='indent-c'><code class='block'>.{645FF040-5081-101B-9F08-00AA002F954E}</code></pre>
	<p>
		The Properties page will show 0, and it shows Recycle Bin properties.
	</p>
	<h2>Hidden and system attributes</h2>
	<pre class='indent-c'><code class='block'>Attrib +h +s</code></pre>
	<p>
		<code class='inline'>+h</code> sets hidden. <code class='inline'>+s</code> sets system.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
