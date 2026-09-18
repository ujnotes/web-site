<div id='message'>
	<p>
		Separate repositories.
	</p>
	<p>
		Will not auto update - as part of parent repo.
	</p>
	<p>
		Will have to be managed separately.
	</p>
	<p>
		No separate .git directory.
	</p>
	<pre class='indent-c'><code class='block'>Git data in parent .git/modules/&lt;name&gt; directory</code></pre>
	<h2>Instead only a .git file</h2>
	<p>
		That links back to the parent git directories' submodule git data directory.
	</p>
	<p>
		.gitmodule file.
	</p>
	<h2>*Path should match in / style too</h2>
	<p>
		Hence use unix style paths only /.
	</p>
	<p>
		Contains records for submodules.
	</p>
	<p>
		Recursive submodules.
	</p>
	<p>
		.git data stored in respective parent .git\modules directory.
	</p>
	<p>
		Run following to pull child submodules recursively.
	</p>
	<pre class='indent-c'><code class='block'>git submodule update --init --recursive</code></pre>
	<p>
		-.
	</p>
	<p>
		Prepare remote separately.
	</p>
	<p>
		And then pull into current parent .git project.
	</p>
	<pre class='indent-c'><code class='block'>git submodule add --name &lt;name&gt; &lt;url&gt; [path]</code></pre>
	<p>
		Url:
	</p>
	<p>
		For example, file:///d//Store.
	</p>
	<p>
		<strong>name.</strong> Is the title.
	</p>
	<pre class='indent-c'><code class='block'>It goes with .git/modules/&lt;name&gt; directory</code></pre>
	<p>
		<strong>path.</strong> Goes in working directory.
	</p>
	<p>
		Can be - relative to current directory (must begin with ./) or absolute.
	</p>
	<p>
		Adds .gitmodules file at root.
	</p>
	<h2>The directory name though still is the git target’s name</h2>
	<h4>This has to be renamed manually if required</h4>
	<p>
		Path reference has to be updated in .gitmodules as well.
	</p>
	<p>
		DO NOT rename directories manually. Use the path and name params instead.
	</p>
	<h2>Should show up as a already staged entry in git status</h2>
	<pre class='indent-c'><code class='block'>Content will be “Subproject commit &lt;hash&gt;”</code></pre>
	<p>
		Git uninit.
	</p>
	<h2>deinit</h2>
	<pre class='indent-c'><code class='block'>deinit git submodule deinit -f &lt;submodule:name&gt;</code></pre>
	<pre class='indent-c'><code class='block'>deinit May not remove the .git\modules\&lt;name&gt; directory</code></pre>
	<p>
		May not remove entry from .gitmodules file.
	</p>
	<pre class='indent-c'><code class='block'>Will not remove &lt;name&gt; directory from working directory, will probably be left empty</code></pre>
	<p>
		Add from console separately post submodule add.
	</p>
	<p>
		An object with only the repo hash will be created.
	</p>
	<p>
		Additional steps (legacy).
	</p>
	<p>
		https://stackoverflow.com/a/16162000/483588
	</p>
	<ol class="list-number content-list">
		<li><div>mv a/submodule a/submodule_tmp.</div></li>
	</ol>
	<pre class='indent-c'><code class='block'>1. git submodule deinit -f -- &lt;a/submodule&gt;</code></pre>
	<pre class='indent-c'><code class='block'>2. rm -rf .git/modules/a/submodule</code></pre>
	<pre class='indent-c'><code class='block'>3. git rm -f a/submodule</code></pre>
	<p>
		<strong># Note.</strong> A/submodule (no trailing slash).
	</p>
	<p>
		Edit the .gitmodule file.
	</p>
	<h3>or, if you want to leave it in your working tree and have done step 0.</h3>
	<pre class='indent-c'><code class='block'>3.   git rm --cached a/submodule</code></pre>
	<p>
		3bis mv a/submodule_tmp a/submodule.
	</p>
	<h2>Add submodule directory to index</h2>
	<p>
		Git submodule add -- will add existing repo to index if rest is fine.
	</p>
	<h2>git ls-files</h2>
	<p>
		Shows files in index.
	</p>
	<pre class='indent-c'><code class='block'>git submodule update --init --recursive</code></pre>
	<p>
		Fetches nested submodules.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
