<div id='message'>
	<pre class='indent-c'><code class='block'>git branch -m old_branch new_branch         # Rename branch locally</code></pre>
	<h2>git push origin :old_branch</h2>
	<h3>Delete the old branch.</h3>
	<pre class='indent-c'><code class='block'>git push --set-upstream origin new_branch   # Push the new branch, set local branch</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
