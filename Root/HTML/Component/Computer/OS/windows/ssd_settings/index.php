<div id='message'>
	<h2>Temp</h2>
	<p>
		CU, LU: <code class='inline'>Temp</code>, <code class='inline'>Tmp</code>.
	</p>
	<h2>Windows Update downloads</h2>
	<p>
		Caution: <code class='inline'>RD</code> removes <code class='inline'>SoftwareDistribution\Downloads</code>.
	</p>
	<pre class='indent-c'><code class='block'>RD %WinDir%\SoftwareDistribution\Downloads
CD %WinDir%\SoftwareDistribution</code></pre>
	<pre class='indent-c'><code class='block'>MkLink /D Download "F:\Win-8-Pro-x64_Updates"</code></pre>
	<h2>Restore Updates</h2>
	<pre class='indent-c'><code class='block'>MkLink /D Download "F:\Win-8-Pro-x64_Updates"</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
