<div id='message'>
	<p>
		http://stackoverflow.com/questions/927358/how-do-you-undo-the-last-commit
	</p>
	<p>
		Last commit.
	</p>
	<h2>Keep interim changes between</h2>
	<p>
		Git reset HEAD~.
	</p>
	<p>
		<strong>Keep ‘index’.</strong> (adds).
	</p>
	<pre class='indent-c'><code class='block'>Git reset --soft HEAD~</code></pre>
	<h2>Remove trace (nuke)</h2>
	<p>
		Interim changes between B &amp; will be lost.
	</p>
	<pre class='indent-c'><code class='block'>Git reset --hard HEAD~</code></pre>
	<pre class='indent-c'><code class='block'>To still recover use checkout &lt;hash&gt;</code></pre>
	<p>
		What happens to the untracked files at B?
	</p>
	<p>
		<strong>@.</strong> Head.
	</p>
	<h2>Remove the very first commit</h2>
	<pre class='indent-c'><code class='block'>git update-ref -d HEAD</code></pre>
	<p>
		Changes from first commit - in staging area.
	</p>
	<h2>Minor changes</h2>
	<pre class='indent-c'><code class='block'>Commit --amend</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
