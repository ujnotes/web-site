<div id='message'>
	<p>
		In diskpart, a hidden partition reports Id 27 and Type Hidden. Set the ID and assign a drive letter.
	</p>
	<p>
		Caution: this changes partition type and needs admin rights.
	</p>
	<h2>diskpart</h2>
	<pre class='indent-c'><code class='block'>Select Disk _
Select Partition _ [1
Detail Partition</code></pre>
	<p>
		<code class='inline'>Detail Partition</code> reports:
	</p>
	<pre class='indent-c'><code class='block'>Id = 27
Type = Hidden</code></pre>
	<pre class='indent-c'><code class='block'>Set Id=07 Override</code></pre>
	<h2>Drive letter</h2>
	<pre class='indent-c'><code class='block'>Diskmgmt.msc &gt; Set drive letter</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
