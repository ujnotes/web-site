<div id='message'>
	<p>
		Disable (Hide) the Connections page.
	</p>
	<h2>Policy</h2>
	<p>
		User Configuration\Administrative Templates\Windows Components\Internet Explorer\Internet Control Panel\.
	</p>
	<ul class="list-bullet content-list">
		<li><div>Disable the Connections page.</div></li>
	</ul>
	<h2>Reg</h2>
	<pre class='indent-c'><code class='block'>[HKEY_CURRENT_USER\SOFTWARE\Policies\Microsoft\Internet Explorer\Control Panel]</code></pre>
	<pre class='indent-c'><code class='block'>[HKEY_LOCAL_MACHINE\SOFTWARE\Policies\Microsoft\Internet Explorer\Control Panel]</code></pre>
	<p>
		"ConnectionsTab"=-|0|1-Disable.
	</p>
	<p>
		________________.
	</p>
	<p>
		Disable changing proxy settings (Dim).
	</p>
	<p>
		User Configuration\Administrative Templates\Windows Components\Internet Explorer\.
	</p>
	<ul class="list-bullet content-list">
		<li><div>Disable changing proxy settings.</div></li>
	</ul>
	<h2>Reg</h2>
	<pre class='indent-c'><code class='block'>[HKEY_CURRENT_USER\SOFTWARE\Policies\Microsoft\Internet Explorer\Control Panel]</code></pre>
	<pre class='indent-c'><code class='block'>[HKEY_LOCAL_MACHINE\SOFTWARE\Policies\Microsoft\Internet Explorer\Control Panel]</code></pre>
	<p>
		“Proxy”=0-Disable|1-Enable.
	</p>
	<p>
		________________.
	</p>
	<h2>Enable Proxy</h2>
	<p>
		Internet Settings &gt; Connections &gt; LAN Settings &gt; [Proxy Server] : Use a proxy... [X].
	</p>
	<h2>Reg</h2>
	<pre class='indent-c'><code class='block'>HKEY_CURRENT_USER\Software\Microsoft\Windows\CurrentVersion\Internet Settings</code></pre>
	<p>
		"ProxyEnable"=dword:00000000.
	</p>
	<p>
		________________.
	</p>
	<h2>Whitelist</h2>
	<pre class='indent-c'><code class='block'>&gt; Advanced &gt; [Exceptions] : Do not use proxy... &gt; &lt;website.com&gt;[;...]</code></pre>
	<h2>Reg</h2>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
