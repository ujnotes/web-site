<div id='message'>
	<h2>init</h2>
	<pre class='indent-c'><code class='block'>init --bare</code></pre>
	<p>
		Minimal - repo only.
	</p>
	<p>
		Generally a <code class='inline'>.git</code> is appended to the root directory name.
	</p>
	<p>
		Has no working directory and the content of the .git directory is at the root directly.
	</p>
	<h2>add</h2>
	<pre class='indent-c'><code class='block'>add -A : include file deletions</code></pre>
	<pre class='indent-c'><code class='block'>add &lt;path:at and underneath .&gt;</code></pre>
	<pre class='indent-c'><code class='block'>add -u</code></pre>
	<p>
		All deletes.
	</p>
	<h2>reset</h2>
	<pre class='indent-c'><code class='block'>reset &lt;path&gt;</code></pre>
	<pre class='indent-c'><code class='block'>reset --hard</code></pre>
	<p>
		Removes from staging.
	</p>
	<h2>HEAD [~&lt;n&gt;]</h2>
	<p>
		N steps before HEAD.
	</p>
	<p>
		Can be used to remove commits (also from origin).
	</p>
	<p>
		Force push will be required.
	</p>
	<pre class='indent-c'><code class='block'>HEAD [~&lt;n&gt;] &lt;commit-hash&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;commit-hash&gt; --soft</code></pre>
	<p>
		HEAD [~[n]].
	</p>
	<p>
		Keep files in index (adds).
	</p>
	<p>
		Commit.
	</p>
	<pre class='indent-c'><code class='block'>-m ‘&lt;name&gt;’ [path]</code></pre>
	<pre class='indent-c'><code class='block'>--amend</code></pre>
	<p>
		Merge current changes with previous edit.
	</p>
	<ul class="list-bullet content-list">
		<li><div>may cause loss of info.</div></li>
	</ul>
	<ul class="list-bullet content-list">
		<li><div>do not amend public repos.</div></li>
	</ul>
	<pre class='indent-c'><code class='block'>--no-edit</code></pre>
	<p>
		Do not offer to edit commit message.
	</p>
	<p>
		Fetch.
	</p>
	<ul class="list-bullet content-list">
		<li><div><code class='inline'>--prune</code> -- ??.</div></li>
	</ul>
	<p>
		Clone - make a copy.
	</p>
	<h2>clone</h2>
	<p>
		[-b &lt;branch].
	</p>
	<pre class='indent-c'><code class='block'>clone &lt;&lt;url&gt;.git&gt; [target-directory &lt;root-level&gt; : also the new repo name]</code></pre>
	<pre class='indent-c'><code class='block'>config [ --global]</code></pre>
	<p>
		Username.
	</p>
	<pre class='indent-c'><code class='block'>user.name "&lt;&gt;”</code></pre>
	<p>
		Email.
	</p>
	<pre class='indent-c'><code class='block'>user.email “&lt;&gt;”</code></pre>
	<p>
		Show.
	</p>
	<pre class='indent-c'><code class='block'>-l</code></pre>
	<p>
		Lists.
	</p>
	<pre class='indent-c'><code class='block'>core.autocrlf &lt;true|false&gt;</code></pre>
	<p>
		Auto CR LF.
	</p>
	<h2>remote</h2>
	<pre class='indent-c'><code class='block'>remote -v</code></pre>
	<p>
		Shows origin.
	</p>
	<pre class='indent-c'><code class='block'>add origin &lt;&gt;.git</code></pre>
	<pre class='indent-c'><code class='block'>add set-url origin &lt;&gt;.git</code></pre>
	<h2>diff</h2>
	<p>
		[path].
	</p>
	<pre class='indent-c'><code class='block'>update-index</code></pre>
	<p>
		Ignore (even if versioned).
	</p>
	<pre class='indent-c'><code class='block'>--assume-unchanged [path]</code></pre>
	<p>
		.git/config.
	</p>
	<p>
		Enable password caching.
	</p>
	<pre class='indent-c'><code class='block'>config --global credential.helper osxkeychain</code></pre>
	<p>
		Commit.
	</p>
	<pre class='indent-c'><code class='block'>--amend</code></pre>
	<p>
		Undo.
	</p>
	<h2>checkout</h2>
	<p>
		Select branch.
	</p>
	<pre class='indent-c'><code class='block'>&lt;file&gt;</code></pre>
	<p>
		A particular file.
	</p>
	<pre class='indent-c'><code class='block'>&lt;file&gt; &lt;commit-hash&gt;</code></pre>
	<p>
		Only changes in that commit.
	</p>
	<p>
		In an empty directory will check-out those files.
	</p>
	<ul class="list-bullet content-list">
		<li><div><code class='inline'>-b &lt;branch_name&gt;</code> -- Creates then checkout new branch.</div></li>
	</ul>
	<pre class='indent-c'><code class='block'>&lt;commit-hash&gt; git checkout stash@{0} -- &lt;filename&gt;</code></pre>
	<h2>clean</h2>
	<pre class='indent-c'><code class='block'>clean -d directories</code></pre>
	<pre class='indent-c'><code class='block'>clean -f ?files?</code></pre>
	<pre class='indent-c'><code class='block'>clean -i interactive</code></pre>
	<p>
		Deletes extra, i.e. unversioned files.
	</p>
	<p>
		Branch.
	</p>
	<h2>()</h2>
	<p>
		Show the local branches.
	</p>
	<h2>&lt;branch_name&gt;</h2>
	<pre class='indent-c'><code class='block'>&lt;branch_name&gt; // to also reflect this push to origin :refs/tags/&lt;tag_title&gt;</code></pre>
	<pre class='indent-c'><code class='block'>-d</code></pre>
	<p>
		Deletes.
	</p>
	<pre class='indent-c'><code class='block'>-D &lt;branch&gt;</code></pre>
	<p>
		Deletes branch locally.
	</p>
	<pre class='indent-c'><code class='block'>-r</code></pre>
	<p>
		Show remote branch.
	</p>
	<p>
		Exit.
	</p>
	<p>
		Q.
	</p>
	<p>
		(shift + q.
	</p>
	<p>
		Log.
	</p>
	<pre class='indent-c'><code class='block'>--oneline [branch]</code></pre>
	<pre class='indent-c'><code class='block'>--no-merges [branch]</code></pre>
	<pre class='indent-c'><code class='block'>cherry-pick</code></pre>
	<pre class='indent-c'><code class='block'>&lt;hash&gt;</code></pre>
	<h2>push</h2>
	<pre class='indent-c'><code class='block'>push -f</code></pre>
	<p>
		Force.
	</p>
	<p>
		Origin.
	</p>
	<pre class='indent-c'><code class='block'>push &lt;tag-name&gt; | &lt;branch-name&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;hash&gt;:&lt;branch&gt;</code></pre>
	<p>
		Specific commit only.
	</p>
	<p>
		Like one of the say two commits ahead of the origin/master.
	</p>
	<pre class='indent-c'><code class='block'>&lt;hash&gt;:&lt;branch&gt; --set-upstream origin master</code></pre>
	<ul class="list-bullet content-list">
		<li><div><code class='inline'>--tags</code> -- All tags.</div></li>
	</ul>
	<h2>pull</h2>
	<pre class='indent-c'><code class='block'>pull &lt;source: origin&gt;</code></pre>
	<pre class='indent-c'><code class='block'>pull &lt;source: branch&gt;</code></pre>
	<p>
		Will overwrite irrespective of branch.
	</p>
	<h2>diff</h2>
	<pre class='indent-c'><code class='block'>diff HEAD^^ &lt;file_path&gt;</code></pre>
	<h2>amend</h2>
	<p>
		Reset commit message.
	</p>
	<pre class='indent-c'><code class='block'>git commit --amend</code></pre>
	<pre class='indent-c'><code class='block'>git commit --amend -m "New commit message"</code></pre>
	<h2>Tracking branch</h2>
	<pre class='indent-c'><code class='block'>branch -vv</code></pre>
	<p>
		Shows remote tracking branch.
	</p>
	<h2>show</h2>
	<pre class='indent-c'><code class='block'>show stash@{0}:&lt;path&gt;</code></pre>
	<p>
		Display file content on screen.
	</p>
	<h2>revert</h2>
	<pre class='indent-c'><code class='block'>revert &lt;path&gt;</code></pre>
	<p>
		Record new commit to revert previous (usually a faulty one).
	</p>
	<h2>remote</h2>
	<pre class='indent-c'><code class='block'>remote -vv</code></pre>
	<p>
		Shows.
	</p>
	<pre class='indent-c'><code class='block'>remote add &lt;url&gt;</code></pre>
	<pre class='indent-c'><code class='block'>remote set-url origin [push] &lt;url&gt;</code></pre>
	<h4>remove</h4>
	<p>
		Origin.
	</p>
	<h2>rebase</h2>
	<pre class='indent-c'><code class='block'>rebase &lt;commit&gt;</code></pre>
	<p>
		Rebases current branch on to the referenced commit.
	</p>
	<ul class="list-bullet content-list">
		<li><div>may cause loss of info.</div></li>
	</ul>
	<ul class="list-bullet content-list">
		<li><div>do not rebase public repos.</div></li>
	</ul>
	<h2>rm</h2>
	<pre class='indent-c'><code class='block'>rm --cached</code></pre>
	<p>
		Keep local, delete only from git.
	</p>
	<p>
		Removed.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
