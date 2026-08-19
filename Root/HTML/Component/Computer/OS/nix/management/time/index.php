<div id='message'>
	<h2>Date and time</h2>
	<pre class='indent-c'><code class='block'>date</code></pre>
	<h2>Timezone</h2>
	<p>
		View the timezone:
	</p>
	<pre class='indent-c'><code class='block'>cat /etc/timezone</code></pre>
	<pre class='indent-c'><code class='block'>grep UTC /etc/default/rcS</code></pre>
	<pre class='indent-c'><code class='block'>date</code></pre>
	<p>
		Hardware clock:
	</p>
	<pre class='indent-c'><code class='block'>sudo hwclock --show</code></pre>
	<h2>Set</h2>
	<pre class='indent-c'><code class='block'>sudo dpkg-reconfigure tzdata</code></pre>
	<p>
		Caution: these timezone and clock commands need admin rights.
	</p>
	<h2>Cron after timezone change</h2>
	<p>
		Cron does not auto-sync and continues to work on the previous timezone (UTC). Restart it:
	</p>
	<pre class='indent-c'><code class='block'>/etc/init.d/cron stop
/etc/init.d/cron start</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
