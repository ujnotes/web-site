<div id='message'>
	<p>
		Copy of .git.
	</p>
	<p>
		Git into.
	</p>
	<pre class='indent-c'><code class='block'>git --bare init</code></pre>
	<p>
		This suffices for new (central) remote. i.e git bare fetch is not necessary.
	</p>
	<pre class='indent-c'><code class='block'>git --bare fetch</code></pre>
	<p>
		To be used to mirror another .git/remote.
	</p>
	<h2>Central repo</h2>
	<h4>Bare repo (w/o .git and WD, content of .git at ./)</h4>
	<p>
		As remote.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
