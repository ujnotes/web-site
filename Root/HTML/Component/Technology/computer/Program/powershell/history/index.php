<div id='message'>
	<p>
		History: Set-PSReadLineOption –HistoryNoDuplicates:$True, and %AppData%\Microsoft\Windows\PowerShell\PSReadLine\.
	</p>
	<p>
		https://www.howtogeek.com/298244/how-to-use-your-command-history-in-windows-powershell
	</p>
	<p>
		No duplicates.
	</p>
	<pre class='indent-c'><code class='block'>Set-PSReadLineOption –HistoryNoDuplicates:$True</code></pre>
	<p>
		(Get-PSReadlineOption).HistorySavePath.
	</p>
	<pre class='indent-c'><code class='block'>%AppData%\Microsoft\Windows\PowerShell\PSReadLine\ConsoleHost_history.txt</code></pre>
	<p>
		Editable directly.
	</p>
	<p>
		Ctrl + R.
	</p>
	<p>
		Reverse search.
	</p>
	<p>
		Ctrl + S.
	</p>
	<p>
		Forward search.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
