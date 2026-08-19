<div id='message'>
	<h2>git stash</h2>
	<p>
		Stashes current changes.
	</p>
	<pre class='indent-c'><code class='block'>git  stash --all</code></pre>
	<p>
		Stashes ALL changes - even the untracked ones! CAREFULL.
	</p>
	<h4>(save)</h4>
	<p>
		Saves the current changes and brings the repo state to default.
	</p>
	<pre class='indent-c'><code class='block'>-u</code></pre>
	<p>
		?untracked?
	</p>
	<h2>apply</h2>
	<p>
		Applies the saved stash.
	</p>
	<p>
		DOES NOT REMOVE from the stash, use pop.
	</p>
	<h2>pop</h2>
	<p>
		Apply and remove from stash (if successful).
	</p>
	<pre class='indent-c'><code class='block'>stash@{&lt;N&gt;}</code></pre>
	<p>
		?Particular?
	</p>
	<h2>drop</h2>
	<p>
		Deletes topmost stash.
	</p>
	<p>
		Clear.
	</p>
	<pre class='indent-c'><code class='block'>show -p stash@{&lt;N&gt;}</code></pre>
	<p>
		N:0….
	</p>
	<p>
		Powershell: ‘{‘ or `{.
	</p>
	<h2>list</h2>
	<p>
		Show list.
	</p>
	<h2>show</h2>
	<p>
		Show files in latest stash.
	</p>
	<pre class='indent-c'><code class='block'>-p</code></pre>
	<p>
		Show contents as well.
	</p>
	<pre class='indent-c'><code class='block'>stash@{&lt;N&gt;}</code></pre>
	<p>
		Show of particular stash.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
