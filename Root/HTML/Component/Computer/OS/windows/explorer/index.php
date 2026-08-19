<div id='message'>
	<h2>/n</h2>
	<p>
		Opens a new window in single-paned (My Computer) view for each item selected, even if the new window duplicates a window that is already open.
	</p>
	<pre class='indent-c'><code class='block'>/n</code></pre>
	<h2>/e</h2>
	<p>
		Uses Windows Explorer view. Windows Explorer view is most similar to File Manager in Windows version 3.x. The default view is Open view.
	</p>
	<pre class='indent-c'><code class='block'>/e</code></pre>
	<h2>/root</h2>
	<pre class='indent-c'><code class='block'>/root,&lt;object&gt;</code></pre>
	<p>
		Specifies the root level of the specified view. The default is to use the normal namespace root (the desktop). Whatever is specified is the root for the display.
	</p>
	<h2>/select</h2>
	<pre class='indent-c'><code class='block'>/select,&lt;sub object&gt;</code></pre>
	<p>
		Specifies the folder to receive the initial focus. If <code class='inline'>/select</code> is used, the parent folder is opened and the specified object is selected.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
