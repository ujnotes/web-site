<div id='message'>
	<h2>Select the branch to merge to</h2>
	<pre class='indent-c'><code class='block'>git checkout &lt;master_branch&gt;</code></pre>
	<h2>Merge</h2>
	<pre class='indent-c'><code class='block'>Merge git merge [--no-ff] &lt;working_branch&gt;</code></pre>
	<pre class='indent-c'><code class='block'>no-ff : interim commits are compressed</code></pre>
	<h2>Delete</h2>
	<pre class='indent-c'><code class='block'>Delete git branch -d &lt;working_branch&gt;</code></pre>
	<h2>Push</h2>
	<pre class='indent-c'><code class='block'>Push git push origin &lt;master_branch&gt;</code></pre>
	<h2>Choose one version over the other</h2>
	<pre class='indent-c'><code class='block'>git merge &lt;branch&gt; -X [ours | theirs]</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
