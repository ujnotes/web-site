<div id='message'>
	<p>
		Clear hidden and system attributes with attrib -h -s, including /s for subdirectories and /d for directories.
	</p>
	<pre class='indent-c'><code class='block'>Attrib -h -s &lt;Dir_Name&gt;</code></pre>
	<p>
		Recursive, directories included:
	</p>
	<pre class='indent-c'><code class='block'>/s /d -s -h *</code></pre>
	<ul class="list-bullet content-list">
		<li><div><code class='inline'>/s</code> — sub-directory files.</div></li>
		<li><div><code class='inline'>/d</code> — directories.</div></li>
		<li><div><code class='inline'>-s</code> — system.</div></li>
		<li><div><code class='inline'>-h</code> — hidden.</div></li>
	</ul>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
