<div id='message'>
	<h2>Out of sync</h2>
	<p>
		<strong>Message.</strong> Rejected master -&gt; master (non-fast-forward).
	</p>
	<p>
		Pull before push.
	</p>
	<pre class='indent-c'><code class='block'>git pull --rebase</code></pre>
	<h2>Repair</h2>
	<p>
		Git repack remote/origin/master.
	</p>
	<p>
		Git push error '[remote rejected] master -&gt; master (branch is currently checked out)'.
	</p>
	<pre class='indent-c'><code class='block'>git config --bool core.bare true</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
