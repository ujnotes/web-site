<div id='message'>
	<p>
		Map accounts to SIDs in ProfileList and hivelist, and list them with wmic useraccount.
	</p>
	<pre class='indent-c'><code class='block'>HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Windows NT\CurrentVersion\ProfileList
HKEY_LOCAL_MACHINE\SYSTEM\CurrentControlSet\Control\hivelist</code></pre>
	<pre class='indent-c'><code class='block'>The profile must be loaded first to show up in `HKEY_Users`.</code></pre>
	<ul class="list-bullet content-list">
		<li><div>Users — <code class='inline'>S-1-5-21-</code>.</div></li>
		<li><div>Local users — <code class='inline'>S-1-5-21-12</code>.</div></li>
		<li><div>Domain Users — <code class='inline'>S-1-5-21-13</code>.</div></li>
	</ul>
	<pre class='indent-c'><code class='block'>wmic useraccount get name,sid</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
