<div id='message'>
	<p>
		.
	</p>
	<p>
		Gitignore.
	</p>
	<p>
		[Dir|**/]|[Path].
	</p>
	<p>
		**/.
	</p>
	<p>
		Match in all directories.
	</p>
	<p>
		Empty line.
	</p>
	<pre class='indent-c'><code class='block'>-void</code></pre>
	<p>
		#.
	</p>
	<h2>comment</h2>
	<p>
		Escape with \.
	</p>
	<p>
		!
	</p>
	<p>
		Inverse.
	</p>
	<h2>Tracked file</h2>
	<p>
		Added to ignore list will continue to be tracked.
	</p>
	<p>
		Incase of a directory, new files will not be prompted to be tracked.
	</p>
	<p>
		Thus, they need to be untracked.
	</p>
	<p>
		Local only ignore.
	</p>
	<p>
		.git/info/exclude.
	</p>
	<p>
		Update cache for marked changes - already registered.
	</p>
	<pre class='indent-c'><code class='block'>git update-index --skip-worktree &lt;file-list&gt;</code></pre>
	<h2>Undo</h2>
	<p>
		Remove entry from .git/info/exclude.
	</p>
	<pre class='indent-c'><code class='block'>git update-index --no-skip-worktree &lt;file-list&gt;</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
