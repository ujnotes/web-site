<div id='message'>
	<p>
		To undo the x64 change, and to switch, swap, revert and change back the default media player to Windows Media Player 12 x86 32-bit edition,.
	</p>
	<pre class='indent-c'><code class='block'>%WinDir%\system32\unregmp2.exe /SwapTo:32</code></pre>
	<pre class='indent-c'><code class='block'>For value data of “Path” sub-key of “HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Windows\CurrentVersion\App Paths\wmplayer.exe” registry branch,</code></pre>
	<p>
		Sets it to %ProgramFiles (x86)%\Windows Media Player.
	</p>
	<p>
		Then copy and paste the following code to a text editor to create a .reg file,.
	</p>
	<p>
		Which can be ran to merge the registry keys and values to change the WMP file associations.
	</p>
	<p>
		Windows Registry Editor Version 5.00.
	</p>
	<pre class='indent-c'><code class='block'>[HKEY_CLASSES_ROOT\CLSID\{45597c98-80f6-4549-84ff-752cf55e2d29}\LocalServer32]</code></pre>
	<p>
		@=hex(2):22,00,25,00,50,00,72,00,6f,00,67,00,72,00,61,00,6d,00,46,00,69,00,6c,\.
	</p>
	<p>
		00,65,00,73,00,28,00,78,00,38,00,36,00,29,00,25,00,5c,00,57,00,69,00,6e,00,\.
	</p>
	<p>
		64,00,6f,00,77,00,73,00,20,00,4d,00,65,00,64,00,69,00,61,00,20,00,50,00,6c,\.
	</p>
	<p>
		00,61,00,79,00,65,00,72,00,5c,00,77,00,6d,00,70,00,6c,00,61,00,79,00,65,00,\.
	</p>
	<p>
		72,00,2e,00,65,00,78,00,65,00,22,00,20,00,2f,00,45,00,6e,00,71,00,75,00,65,\.
	</p>
	<p>
		00,75,00,65,00,00,00.
	</p>
	<pre class='indent-c'><code class='block'>[HKEY_CLASSES_ROOT\CLSID\{cdc32574-7521-4124-90c3-8d5605a34933}\LocalServer32]</code></pre>
	<p>
		@=hex(2):22,00,25,00,50,00,72,00,6f,00,67,00,72,00,61,00,6d,00,46,00,69,00,6c,\.
	</p>
	<p>
		00,65,00,73,00,28,00,78,00,38,00,36,00,29,00,25,00,5c,00,57,00,69,00,6e,00,\.
	</p>
	<p>
		64,00,6f,00,77,00,73,00,20,00,4d,00,65,00,64,00,69,00,61,00,20,00,50,00,6c,\.
	</p>
	<p>
		00,61,00,79,00,65,00,72,00,5c,00,77,00,6d,00,70,00,6c,00,61,00,79,00,65,00,\.
	</p>
	<p>
		72,00,2e,00,65,00,78,00,65,00,22,00,20,00,2f,00,42,00,75,00,72,00,6e,00,43,\.
	</p>
	<p>
		00,44,00,00,00.
	</p>
	<pre class='indent-c'><code class='block'>[HKEY_CLASSES_ROOT\CLSID\{ed1d0fdf-4414-470a-a56d-cfb68623fc58}\LocalServer32]</code></pre>
	<p>
		@=hex(2):22,00,25,00,50,00,72,00,6f,00,67,00,72,00,61,00,6d,00,46,00,69,00,6c,\.
	</p>
	<p>
		00,65,00,73,00,28,00,78,00,38,00,36,00,29,00,25,00,5c,00,57,00,69,00,6e,00,\.
	</p>
	<p>
		64,00,6f,00,77,00,73,00,20,00,4d,00,65,00,64,00,69,00,61,00,20,00,50,00,6c,\.
	</p>
	<p>
		00,61,00,79,00,65,00,72,00,5c,00,77,00,6d,00,70,00,6c,00,61,00,79,00,65,00,\.
	</p>
	<p>
		72,00,2e,00,65,00,78,00,65,00,22,00,20,00,2f,00,50,00,6c,00,61,00,79,00,00,\.
	</p>
	<p>
		00.
	</p>
	<p>
		Finally, re-pin the WMP x86 icon onto Taskbar to be able to run 32-bit WMP directly from Taskbar.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
