<div id='message'>
	<h2>1. Run</h2>
	<pre class='indent-c'><code class='block'>%WinDir%\system32\unregmp2.exe /SwapTo:64</code></pre>
	<p>
		<strong>2. Replace.</strong> ProgramFiles(x86)\Windows Media Player &gt; ProgramFiles\Windows Media Player.
	</p>
	<h2>Write Access</h2>
	<p>
		[Advanced]:Permissions &gt; Advanced &gt; Owner &gt; [Replace owner on subcontainers and groups].
	</p>
	<p>
		<strong>[Security].</strong> Add &gt; {CU} &gt; Full Control &gt; Allow.
	</p>
	<p>
		HKLM\Software\CLASSES\CLSID\{45597c98-80f6-4549-84ff-752cf55e2d29}\LocalServer32.
	</p>
	<p>
		HKLM\Software\CLASSES\CLSID\{cdc32574-7521-4124-90c3-8d5605a34933}\LocalServer32.
	</p>
	<p>
		HKLM\Software\CLASSES\CLSID\{ed1d0fdf-4414-470a-a56d-cfb68623fc58}\LocalServer32.
	</p>
	<p>
		Reg Import "g:\settings\windows 7\windows media player x64\x64.reg".
	</p>
	<p>
		A.
	</p>
	<p>
		Explorer enqueue.
	</p>
	<pre class='indent-c'><code class='block'>[HKEY_CLASSES_ROOT\CLSID\{45597c98-80f6-4549-84ff-752cf55e2d29}\LocalServer32]</code></pre>
	<p>
		@=hex(2):22,00,25,00,50,00,72,00,6f,00,67,00,72,00,61,00,6d,00,46,00,69,00,6c,\.
	</p>
	<p>
		00,65,00,73,00,25,00,5c,00,57,00,69,00,6e,00,64,00,6f,00,77,00,73,00,20,00,\.
	</p>
	<p>
		4d,00,65,00,64,00,69,00,61,00,20,00,50,00,6c,00,61,00,79,00,65,00,72,00,5c,\.
	</p>
	<p>
		00,77,00,6d,00,70,00,6c,00,61,00,79,00,65,00,72,00,2e,00,65,00,78,00,65,00,\.
	</p>
	<p>
		22,00,20,00,2f,00,45,00,6e,00,71,00,75,00,65,00,75,00,65,00,00,00.
	</p>
	<pre class='indent-c'><code class='block'>B. [HKEY_CLASSES_ROOT\CLSID\{cdc32574-7521-4124-90c3-8d5605a34933}\LocalServer32]</code></pre>
	<p>
		@=hex(2):22,00,25,00,50,00,72,00,6f,00,67,00,72,00,61,00,6d,00,46,00,69,00,6c,\.
	</p>
	<p>
		00,65,00,73,00,25,00,5c,00,57,00,69,00,6e,00,64,00,6f,00,77,00,73,00,20,00,\.
	</p>
	<p>
		4d,00,65,00,64,00,69,00,61,00,20,00,50,00,6c,00,61,00,79,00,65,00,72,00,5c,\.
	</p>
	<p>
		00,77,00,6d,00,70,00,6c,00,61,00,79,00,65,00,72,00,2e,00,65,00,78,00,65,00,\.
	</p>
	<p>
		22,00,20,00,2f,00,42,00,75,00,72,00,6e,00,43,00,44,00,00,00.
	</p>
	<p>
		C.
	</p>
	<pre class='indent-c'><code class='block'>[HKEY_CLASSES_ROOT\CLSID\{ed1d0fdf-4414-470a-a56d-cfb68623fc58}\LocalServer32]</code></pre>
	<p>
		@=hex(2):22,00,25,00,50,00,72,00,6f,00,67,00,72,00,61,00,6d,00,46,00,69,00,6c,\.
	</p>
	<p>
		00,65,00,73,00,25,00,5c,00,57,00,69,00,6e,00,64,00,6f,00,77,00,73,00,20,00,\.
	</p>
	<p>
		4d,00,65,00,64,00,69,00,61,00,20,00,50,00,6c,00,61,00,79,00,65,00,72,00,5c,\.
	</p>
	<p>
		00,77,00,6d,00,70,00,6c,00,61,00,79,00,65,00,72,00,2e,00,65,00,78,00,65,00,\.
	</p>
	<p>
		22,00,20,00,2f,00,50,00,6c,00,61,00,79,00,00,00.
	</p>
	<p>
		Revert Access rights.
	</p>
	<ol class="list-number content-list">
		<li><div>HKLM\Software\Microsoft\Windows\CurrentVersion\App Paths\wmplayer.exe\.</div></li>
	</ol>
	<p>
		Default.
	</p>
	<p>
		Path.
	</p>
	<ol class="list-number content-list">
		<li><div>Replace Shortcuts.</div></li>
	</ol>
	<p>
		________________.
	</p>
	<h2>Additional Locations</h2>
	<pre class='indent-c'><code class='block'>E. HKEY_CLASSES_ROOT\DLNA-PLAYSINGLE\shell\open\command</code></pre>
	<p>
		Default: "%ProgramFiles(x86)%\Windows Media Player\wmplayer.exe" "%L".
	</p>
	<pre class='indent-c'><code class='block'>F. HKEY_CLASSES_ROOT\MMS\shell\open\command</code></pre>
	<p>
		Default: "%ProgramFiles(x86)%\Windows Media Player\wmplayer.exe" "%L".
	</p>
	<pre class='indent-c'><code class='block'>G. HKEY_CLASSES_ROOT\WMP11.AssocFile.3G2\shell\open\command</code></pre>
	<p>
		Default: Reg_Expand_SZ "%ProgramFiles(x86)%\Windows Media Player\wmplayer.exe" /prefetch:6 /Open "%L".
	</p>
	<pre class='indent-c'><code class='block'>H. HKEY_LOCAL_MACHINE\SOFTWARE\Classes\DLNA-PLAYSINGLE\shell\open\command</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
