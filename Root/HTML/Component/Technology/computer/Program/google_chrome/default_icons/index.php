<div id='message'>
	<p>
		Default icons: foreach ($file in (ls "~\AppData\Roaming\Microsoft\Windows\Start Menu\Programs\Chrome Apps")) {.
	</p>
	<p>
		https://bugs.chromium.org/p/chromium/issues/detail?id=732357
	</p>
	<pre class='indent-c'><code class='block'>foreach ($file in (ls "~\AppData\Roaming\Microsoft\Windows\Start Menu\Programs\Chrome Apps"))</code></pre>
	<p>
		$file.LastWriteTime = get-date.
	</p>
	<pre class='indent-c'><code class='block'>}.</code></pre>
	<ol class="list-number content-list">
		<li><div>Delete *VisualElements*.</div></li>
	</ol>
	<p>
		2.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
