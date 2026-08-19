<div id='message'>
	<p>
		Stamp <code class='inline'>LastWriteTime</code> to the current time.
	</p>
	<pre class='indent-c'><code class='block'>foreach ($file in (ls .)) {
     $file.LastWriteTime = get-date
}</code></pre>
	<p>
		Chrome Apps Start Menu folder:
	</p>
	<pre class='indent-c'><code class='block'>foreach ($file in (ls "~\AppData\Roaming\Microsoft\Windows\Start Menu\Programs\Chrome Apps")) {
     $file.LastWriteTime = get-date
}</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
