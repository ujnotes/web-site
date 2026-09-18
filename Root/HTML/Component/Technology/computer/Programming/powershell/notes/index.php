<div id='message'>
	<p>
		PowerShell.com.
	</p>
	<h2>Execution-Policy</h2>
	<h2>Status</h2>
	<h4>ExecutionPolicy</h4>
	<p>
		Restricted.
	</p>
	<p>
		RemoteSigned.
	</p>
	<h2>Enable</h2>
	<pre class='indent-c'><code class='block'>set-executionpolicy remotesigned</code></pre>
	<h2>Revert</h2>
	<pre class='indent-c'><code class='block'>set-executionpolicy restricted</code></pre>
	<h2>Execute Script</h2>
	<h4>Requires absolute path. else</h4>
	<pre class='indent-c'><code class='block'>.\&lt;&gt;.ps1</code></pre>
	<p>
		Hide Runtime Window.
	</p>
	<pre class='indent-c'><code class='block'>PowerShell.exe -windowstyle hidden { your script.. }</code></pre>
	<h2>Version</h2>
	<p>
		$PSVersionTable.
	</p>
	<h2>Debug</h2>
	<h4>$var</h4>
	<p>
		Value in console.
	</p>
	<h3>Write-Host not required (?).</h3>
	<h2>Array</h2>
	<p>
		$array =.
	</p>
	<pre class='indent-c'><code class='block'>Array (&lt;element_1&gt;, &lt;element_2&gt; … )</code></pre>
	<p>
		{ … } hash table.
	</p>
	<p>
		Multi Dimensional array.
	</p>
	<p>
		@( @() ).
	</p>
	<pre class='indent-c'><code class='block'>{ &lt;key&gt;=”&lt;value&gt;”, … }</code></pre>
	<h2>Select Elements</h2>
	<h4>array[0 .. n]</h4>
	<p>
		0 - n elements.
	</p>
	<h4>array[i, j, k]</h4>
	<p>
		Selective.
	</p>
	<h4>this can be joined</h4>
	<pre class='indent-c'><code class='block'>-join ‘’</code></pre>
	<h2>Function</h2>
	<h4>function fn ($a, $b …) {</h4>
	<p>
		….
	</p>
	<p>
		}.
	</p>
	<p>
		Fn A B.
	</p>
	<p>
		() and , separated in .net part.
	</p>
	<h2>Echo</h2>
	<pre class='indent-c'><code class='block'>Write-Host</code></pre>
	<h2>Escape $</h2>
	<h4>$</h4>
	<p>
		`$.
	</p>
	<h4>"X"</h4>
	<p>
		\<code class='inline'>"X\</code>".
	</p>
	<p>
		Perhaps ‘\’ becomes special if it is succeeded by a ‘`’.
	</p>
	<h4>\</h4>
	<p>
		Need not be escaped unless its ADO path.
	</p>
	<h2>`0</h2>
	<p>
		Null.
	</p>
	<h2>`a</h2>
	<p>
		Alert bell/beep.
	</p>
	<h2>`b</h2>
	<p>
		Backspace.
	</p>
	<h2>`f</h2>
	<p>
		Form feed.
	</p>
	<h2>`n</h2>
	<p>
		New line.
	</p>
	<h2>`r</h2>
	<p>
		Carriage return.
	</p>
	<h2>`t</h2>
	<p>
		Horizontal tab.
	</p>
	<h2>`v</h2>
	<p>
		Vertical tab.
	</p>
	<h2>`'</h2>
	<p>
		Single quote.
	</p>
	<h2>`"</h2>
	<p>
		Double quote.
	</p>
	<h2>Getch</h2>
	<p>
		$_ = $host.UI.RawUI.ReadKey("NoEcho”, “IncludeKeyDown").
	</p>
	<h2>Read-Host</h2>
	<pre class='indent-c'><code class='block'>Read-Host "Enter a Password" -assecurestring</code></pre>
	<p>
		This command displays the string "Enter a Password:" as a prompt. As a value is being entered, asterisks (*) appear on the console in place of the input. When the Enter key is pressed, the value is stored as a SecureString object in the $pwd_secure_string variable.
	</p>
	<h2>Concatenate Strings</h2>
	<h4>$A$B</h4>
	<p>
		For param passing.
	</p>
	<h2>“xyz$var1”</h2>
	<p>
		+ worked in .net part.
	</p>
	<p>
		+= can be used.
	</p>
	<p>
		[-f operator].
	</p>
	<pre class='indent-c'><code class='block'>&gt; "comp {0} has {1} MB of memory." -f "L001", "4096"</code></pre>
	<p>
		Comp L001 has 4096 MB of memory.
	</p>
	<h2>Join operator</h2>
	<pre class='indent-c'><code class='block'>Join operator , list - join ‘&lt;filler&gt;’</code></pre>
	<p>
		Eg. ‘x’, ‘y’, ‘z’ - join ‘’ =&gt; xyz‘.
	</p>
	<h2>Split String</h2>
	<h4>split(" ", [StringSplitOptions]'RemoveEmptyEntries')</h4>
	<p>
		Remove empty entries.
	</p>
	<h4>split ‘ {2,}’</h4>
	<p>
		RegEx Matches 2 or more Spaces as delimiter.
	</p>
	<p>
		Split ‘ +’ | Split ‘[,]+}.
	</p>
	<p>
		Multiple.
	</p>
	<h2>Terminate Script</h2>
	<p>
		Exit.
	</p>
	<h2>Test file, directory, registry</h2>
	<p>
		Test-Path.
	</p>
	<h2>Remove</h2>
	<pre class='indent-c'><code class='block'>Remove-Item</code></pre>
	<p>
		Get Time.
	</p>
	<p>
		(Get-Item C:\Windows\notepad.exe).LastWriteTime.
	</p>
	<p>
		.toString().
	</p>
	<h2>Operators</h2>
	<pre class='indent-c'><code class='block'>-not        Not</code></pre>
	<p>
		!
	</p>
	<pre class='indent-c'><code class='block'>-and        And</code></pre>
	<pre class='indent-c'><code class='block'>-and -or        Or</code></pre>
	<pre class='indent-c'><code class='block'>-eq        Equal to</code></pre>
	<pre class='indent-c'><code class='block'>-eq -lt        Less than</code></pre>
	<pre class='indent-c'><code class='block'>-lt -gt        Greater than</code></pre>
	<pre class='indent-c'><code class='block'>-gt -ge        Greater than or Equal to</code></pre>
	<pre class='indent-c'><code class='block'>-ge -le        Less than or equal to</code></pre>
	<pre class='indent-c'><code class='block'>-le -ne        Not equal to</code></pre>
	<h2>True or False</h2>
	<pre class='indent-c'><code class='block'>if ($var -eq $TRUE)</code></pre>
	<p>
		Case insensitive.
	</p>
	<p>
		Var = $TRUE;.
	</p>
	<p>
		If ElseIf Else.
	</p>
	<p>
		Must have { } body.
	</p>
	<h2>Comment</h2>
	<pre class='indent-c'><code class='block'>Comment &lt;#</code></pre>
	<p>
		….
	</p>
	<p>
		#.
	</p>
	<p>
		#&gt;.
	</p>
	<h2>Include</h2>
	<p>
		. “path.ps1”.
	</p>
	<h2>Modules</h2>
	<p>
		http://msdn.microsoft.com/en-us/library/dd878310%28v=vs.85%29.aspx
	</p>
	<h2>Copy</h2>
	<pre class='indent-c'><code class='block'>Copy -recurse</code></pre>
	<p>
		Only container dir.
	</p>
	<ul class="list-bullet content-list">
		<li><div>wildcard can be used at i.</div></li>
	</ul>
	<p>
		Copy-Item i o_Dir.
	</p>
	<h2>Paths</h2>
	<p>
		Current-Dir must be explicitly stated with <code class='inline'>.\</code>.
	</p>
	<p>
		Can have ‘\’ ‘\.\’ ‘\..\’--will be deduced.
	</p>
	<h2>Create</h2>
	<pre class='indent-c'><code class='block'>Create New-Item -ItemType directory -Path &lt;path&gt;</code></pre>
	<h2>Import</h2>
	<pre class='indent-c'><code class='block'>import-csv c:\temp\customers.csv</code></pre>
	<h2>Rename</h2>
	<p>
		Rename-Item.
	</p>
	<p>
		Ren | RnI.
	</p>
	<pre class='indent-c'><code class='block'>Get-Content c:\scripts\test.txt</code></pre>
	<p>
		GC Type Cat.
	</p>
	<p>
		[A new-line separated automatically builds an an array].
	</p>
	<pre class='indent-c'><code class='block'>-totalcount n</code></pre>
	<p>
		Number of lines.
	</p>
	<pre class='indent-c'><code class='block'>-totalcount -last n</code></pre>
	<p>
		Last n lines.
	</p>
	<h2>Measure-Object</h2>
	<p>
		Get Count.
	</p>
	<p>
		[System.IO.File]::OpenText($filename).
	</p>
	<h2>Current Directory</h2>
	<pre class='indent-c'><code class='block'>$(get-location)</code></pre>
	<p>
		$pwd&gt;.
	</p>
	<h2>Resolve Path</h2>
	<p>
		[IO.Path]::GetFullPath().
	</p>
	<pre class='indent-c'><code class='block'>resolve-path ..\frag</code></pre>
	<h2>Tee</h2>
	<pre class='indent-c'><code class='block'>Tee -OutVariable</code></pre>
	<p>
		Also allows appending to the variable.
	</p>
	<p>
		To stop relay to output.
	</p>
	<p>
		| Out-Null.
	</p>
	<p>
		Tee.
	</p>
	<h2>Duration</h2>
	<h4>TotalMilliseconds</h4>
	<p>
		Time from beginning - PERHAPS.
	</p>
	<h2>Directory Tree</h2>
	<p>
		$fileEntries = [IO.Directory]::GetFiles("c:\scripts");.
	</p>
	<p>
		Foreach($fileName in $fileEntries).
	</p>
	<h2>{</h2>
	<p>
		[Console]::WriteLine($fileName);.
	</p>
	<p>
		}.
	</p>
	<h2>$fileName</h2>
	<ul class="list-bullet content-list">
		<li><div>has path glued at the beginning.</div></li>
	</ul>
	<p>
		PS C:\&gt; dir | where {$_.PsIsContainer} | Select-Object Name.
	</p>
	<p>
		Name.
	</p>
	<p>
		—-.
	</p>
	<p>
		Projects.
	</p>
	<p>
		Cygwin.
	</p>
	<p>
		Documents and Settings.
	</p>
	<h2>Convert to UTF-8</h2>
	<p>
		$MyFile = Get-Content $MyPath.
	</p>
	<p>
		$Utf8NoBomEncoding = New-Object System.Text.UTF8Encoding($False).
	</p>
	<h2>[System.IO.File]::WriteAllLines($MyPath, $MyFile, $Utf8NoBomEncoding)</h2>
	<pre class='indent-c'><code class='block'>[System.IO.File]::WriteAllLines($MyPath, $MyFile) -equivalent</code></pre>
	<h2>Read file into Array</h2>
	<p>
		$lines=file('file.txt');.
	</p>
	<p>
		2nd Param - Flags ( | ORable).
	</p>
	<p>
		FILE_USE_INCLUDE_PATH.
	</p>
	<p>
		Search for the file in the include_path.
	</p>
	<p>
		FILE_IGNORE_NEW_LINES.
	</p>
	<p>
		Do not add newline at the end of each array element.
	</p>
	<p>
		FILE_SKIP_EMPTY_LINES.
	</p>
	<p>
		Skip empty lines.
	</p>
	<h2>Place holder variable</h2>
	<h4>$_</h4>
	<p>
		| fn ( $_ ).
	</p>
	<p>
		? correct syntax.
	</p>
	<h2>NULL</h2>
	<p>
		$NULL.
	</p>
	<p>
		Undefined variables, like array element outside bound equals this.
	</p>
	<p>
		Can be used in comparision.
	</p>
	<h2>Out file encoding</h2>
	<pre class='indent-c'><code class='block'>Out file encoding | out-file -encoding ASCII &lt;out-file&gt;</code></pre>
	<p>
		Encoded to UTF-8.
	</p>
	<p>
		Need to test with non ASCII characters.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
