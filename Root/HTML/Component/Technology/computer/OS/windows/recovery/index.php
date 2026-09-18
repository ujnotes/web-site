<div id='message'>
	<pre class='indent-c'><code class='block'>https://technet.microsoft.com/en-us/library/dd799242%28v=ws.10%29.aspx?f=255&amp;MSPPError=-2147217396</code></pre>
	<pre class='indent-c'><code class='block'>https://www.terabyteunlimited.com/kb/article.php?id=587</code></pre>
	<pre class='indent-c'><code class='block'>https://social.technet.microsoft.com/Forums/en-US/9801aa0a-d876-4699-a31d-ba4ca08eea50/solved-how-do-i-prepare-windows-recovery-environment-on-windows-10-taking-backup-measures-on-your?forum=WinPreview2014Setup</code></pre>
	<p>
		A recovery partition is required for Resetting. <code class='inline'>Winre.wim</code> is required to build a recovery drive.
	</p>
	<h2>ReAgentC</h2>
	<pre class='indent-c'><code class='block'>info
enable
disable</code></pre>
	<p>
		Reports RE Status, RE Location, and BCD Identifier.
	</p>
	<h2>Layout</h2>
	<h4>Basic</h4>
	<pre class='indent-c'><code class='block'>\Recovery[\&lt;GUID&gt;]\
    Winre.wim
    ReAgent.xml
    boot.sdi</code></pre>
	<p>
		On MBR: System partition.
	</p>
	<h4>Install.wim</h4>
	<pre class='indent-c'><code class='block'>reagentc.exe /setosimage /path C:\OSMEDIA /target c:\Windows /Index 1</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
