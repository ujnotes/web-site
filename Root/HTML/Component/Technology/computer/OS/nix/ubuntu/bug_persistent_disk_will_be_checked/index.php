<div id='message'>
	<p>
		Empty the notifier file. Logout to check.
	</p>
	<pre class='indent-c'><code class='block'>cat /dev/null &gt; /var/lib/update-notifier/fsck-at-reboot</code></pre>
	<p>
		Caution: this overwrites <code class='inline'>/var/lib/update-notifier/fsck-at-reboot</code>.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
