<div id='message'>
	<p>
		Cmd pipe to clipboard.
	</p>
	<p>
		| clip.
	</p>
	<h2>redirect stderr to stdout</h2>
	<p>
		2&gt;&amp;1.
	</p>
	<p>
		Find in output.
	</p>
	<h2>| find /i "search_string"</h2>
	<pre class='indent-c'><code class='block'>%ErrorLevel% 0:Success 1:Failure</code></pre>
	<h2>Concatenate Variables</h2>
	<p>
		“xyz%var1%abc”.
	</p>
	<p>
		Double Resolution does not work.
	</p>
	<h2>Set X=Y</h2>
	<pre class='indent-c'><code class='block'>%X% = Y</code></pre>
	<h2>Set Y=Z</h2>
	<pre class='indent-c'><code class='block'>%Y%=Z</code></pre>
	<h4>Echo %%X%%</h4>
	<pre class='indent-c'><code class='block'>%Y%</code></pre>
	<p>
		And not Z.
	</p>
	<h2>Set var=%1%)</h2>
	<h4>closing brace should be immediate</h4>
	<p>
		Else results in spaces.
	</p>
	<p>
		Trim set Target=%Target:~0,-16%.
	</p>
	<h2>Pause</h2>
	<pre class='indent-c'><code class='block'>{Emulate} ping -n 10 127.0.0.1 &gt; Nul</code></pre>
	<h2>Goto</h2>
	<pre class='indent-c'><code class='block'>Goto :&lt;Label|EoF&gt;</code></pre>
	<p>
		@GoTo :EoF.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
