<div id='message'>
	<p>
		https://www.tenforums.com/tutorials/28375-change-network-profile-name-windows-10-a.html
	</p>
	<pre class='indent-c'><code class='block'>Secpol.msc &gt; Network List manager policies</code></pre>
	<h2>Rename and delete</h2>
	<p>
		<code class='inline'>Secpol</code> adds a policy instead of a rename, so the registry is better. No better way to delete and rename.
	</p>
	<pre class='indent-c'><code class='block'>HKEY_LOCAL_MACHINE\SOFTWARE\Policies\Microsoft\Windows NT\CurrentVersion\NetworkList\Signatures\&lt;GUID&gt;</code></pre>
	<p>
		Location:
	</p>
	<pre class='indent-c'><code class='block'>HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Windows NT\CurrentVersion\NetworkList\Profiles</code></pre>
	<h2>USB tethering creates a new profile</h2>
	<p>
		USB tethering creates a new profile each time it is connected.
	</p>
	<p>
		https://superuser.com/a/877115/56505
	</p>
	<pre class='indent-c'><code class='block'>HKEY_LOCAL_MACHINE\SYSTEM\CurrentControlSet\Control\Class\{4D36E972-E325-11CE-BFC1-08002BE10318}</code></pre>
	<p>
		Locate the numbered key like <code class='inline'>0001</code> whose <code class='inline'>DriverDesc</code> is the RNDIS driver name (shown in Network Connections — Connect using, and Device Manager).
	</p>
	<p>
		Create a DWORD (32) named <code class='inline'>*NdisDeviceType</code> and set it to <code class='inline'>1</code>. Notice the <code class='inline'>*</code> at the beginning.
	</p>
	<p>
		Disconnect and connect.
	</p>
	<p>
		The computer's network icon will continue to show disconnected.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
