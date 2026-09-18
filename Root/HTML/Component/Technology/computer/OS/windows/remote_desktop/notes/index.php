<div id='message'>
	<p>
		Continue on an unlocked screen:
	</p>
	<pre class='indent-c'><code class='block'>tscon.exe &lt;Session_ID&gt; /dest:console</code></pre>
	<pre class='indent-c'><code class='block'>for /f "skip=1 tokens=3 usebackq" %%s in (
  `query user %username%`
) do (
  %windir%\System32\tscon.exe %%s /dest:console
)</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
