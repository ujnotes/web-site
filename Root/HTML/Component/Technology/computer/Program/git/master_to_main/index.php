<div id='message'>
	<p>
		Create branch from main - rename.
	</p>
	<pre class='indent-c'><code class='block'>git branch -m master main</code></pre>
	<p>
		Push local main to remote main.
	</p>
	<pre class='indent-c'><code class='block'>git push -u origin main</code></pre>
	<p>
		Change default branch.
	</p>
	<p>
		<strong>from master to main - github.</strong> Settings : default branch.
	</p>
	<p>
		Deletes master branch.
	</p>
	<pre class='indent-c'><code class='block'>git push origin --delete master</code></pre>
	<p>
		–.
	</p>
	<p>
		Force main = master (overwrite).
	</p>
	<pre class='indent-c'><code class='block'>git push origin master:main --force</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
