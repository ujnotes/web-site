<div id='message'>
	<p>
		Generate key.
	</p>
	<p>
		Add key to github.
	</p>
	<p>
		List keys.
	</p>
	<pre class='indent-c'><code class='block'>gpg --list-secret-keys --keyid-format=long</code></pre>
	<p>
		To local git config.
	</p>
	<p>
		Add email.
	</p>
	<p>
		Add name.
	</p>
	<p>
		Add key id.
	</p>
	<p>
		Git config user.signingkey _.
	</p>
	<pre class='indent-c'><code class='block'>git commit -S -m "_"</code></pre>
	<p>
		Add force sign.
	</p>
	<p>
		Git config commit.gpgsign true.
	</p>
	<p>
		Verify user email.
	</p>
	<p>
		Adds .patch to github commit url - in order to see the committer email.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
