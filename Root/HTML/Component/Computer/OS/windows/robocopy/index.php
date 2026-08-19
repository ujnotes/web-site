<div id='message'>
	<h2>Flags</h2>
	<ul class="list-bullet content-list">
		<li><div><code class='inline'>b</code> — BackUp Mode. No Access Denied. For BackUp Rights.</div></li>
		<li><div><code class='inline'>mir</code> — Mirror.</div></li>
		<li><div><code class='inline'>xJ</code> — Do not follow Junctions.</div></li>
		<li><div><code class='inline'>copyAll</code> — equivalent to <code class='inline'>/COPY:DATSOU</code> (Data, Attrib, TimeStamps, Security, Owner, aUditing-Info).</div></li>
		<li><div><code class='inline'>xD</code> — Exclude Directory.</div></li>
		<li><div><code class='inline'>xF</code> — Exclude File.</div></li>
	</ul>
	<h2>Backup OS</h2>
	<p>
		Caution: <code class='inline'>/mir</code> mirrors the destination, including deletes.
	</p>
	<pre class='indent-c'><code class='block'>robocopy /b /mir /xj /copyall /b &lt;Src&gt; &lt;Dest&gt;
robocopy /b /mir /xj /copyall /b /R:0 D:\O e:\  /xd "Recycler" "System volume information"</code></pre>
	<p>
		<code class='inline'>/R:0</code> sets retries to 0.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
