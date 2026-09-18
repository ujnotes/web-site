<div id='message'>
	<p>
		Pasted text can carry a Unicode newline (<code class='inline'>\xe2\x80\xa8</code>) instead of a real newline. Replace those bytes in <code class='inline'>permission.txt</code>. <code class='inline'>-i.old</code> writes in place and keeps a <code class='inline'>permission.txt.old</code> backup.
	</p>
	<pre class='indent-c'><code class='block'>sed -i.old $'s/\xe2\x80\xa8/\\\n/g' permission.txt</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
