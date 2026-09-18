<div id='message'>
	<p>
		On Windows 7 and 8, enable auditing of failed connections.
	</p>
	<pre class='indent-c'><code class='block'>Local Computer Policy &gt; Computer Configuration &gt; Windows Settings &gt; Security Settings &gt; Local Policies &gt; Audit Policy &gt; Audit object access : Failure</code></pre>
	<p>
		Dropped connections, with the corresponding executable name, show at:
	</p>
	<pre class='indent-c'><code class='block'>Event log &gt; Windows Logs &gt; Security</code></pre>
	<ul class="list-bullet content-list">
		<li><div>The Windows Filtering Platform has blocked a packet — Event Id <code class='inline'>5152</code>.</div></li>
		<li><div>The Windows Filtering Platform has blocked a connection — Event Id <code class='inline'>5157</code>.</div></li>
	</ul>
	<p>
		Application Name example:
	</p>
	<pre class='indent-c'><code class='block'>\device\harddiskvolume2\program files\xyz.exe</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
