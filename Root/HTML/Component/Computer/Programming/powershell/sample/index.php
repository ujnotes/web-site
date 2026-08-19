<div id='message'>
	<p>
		$global:Halt = $FALSE.
	</p>
	<pre class='indent-c'><code class='block'>$&lt;var&gt; = “&lt;string&gt;”</code></pre>
	<p>
		$fList = @().
	</p>
	<p>
		$fListC = GC $flPath.
	</p>
	<p>
		Foreach ($e in $fListC).
	</p>
	<h2>{</h2>
	<p>
		$fList += ,($e.Split("`t", [StringSplitOptions]'RemoveEmptyEntries')).
	</p>
	<p>
		}.
	</p>
	<h2>Include</h2>
	<p>
		. ".\Tools\Fn.ps1".
	</p>
	<pre class='indent-c'><code class='block'>if ((Test-Path $oRoot) -ne $TRUE)</code></pre>
	<h2>{</h2>
	<pre class='indent-c'><code class='block'>New-Item -ItemType directory -Path $oRoot</code></pre>
	<p>
		}.
	</p>
	<pre class='indent-c'><code class='block'>Write-Host $element</code></pre>
	<p>
		XExit.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
