<div id='message'>
	<p>
		Working notes on Notes: Get Current Dir, Named Parameter, if WScript.Arguments.Named.Exists("a") then, and and used thus.
	</p>
	<h2>Get Current Dir</h2>
	<p>
		SCurPath = CreateObject("Scripting.FileSystemObject").GetAbsolutePathName(".").
	</p>
	<p>
		Additional Quotes in passed parameter.
	</p>
	<p>
		All quotes are removed by VB.
	</p>
	<h2>Named Parameter</h2>
	<p>
		Dim arg.
	</p>
	<pre class='indent-c'><code class='block'>if WScript.Arguments.Named.Exists("a") then</code></pre>
	<p>
		Arg = WScript.Arguments.Named("a").
	</p>
	<p>
		Arg = chr(34) &amp; arg &amp; chr(34).
	</p>
	<p>
		End if.
	</p>
	<h2>and used thus</h2>
	<p>
		Cscript test.vbs /a:"a parameter".
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
