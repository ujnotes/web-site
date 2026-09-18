<div id='message'>
	<pre class='indent-c'><code class='block'>WinPosStr:S:0,1,&lt;X_Beg&gt;,&lt;Y_Beg&gt;,&lt;X_End&gt;,&lt;Y_End&gt;</code></pre>
	<h2>Windows 8 borders</h2>
	<p>
		<code class='inline'>Border_T_Width</code> — <code class='inline'>08+02</code> = <code class='inline'>16</code>
	</p>
	<p>
		<code class='inline'>Border_T_Height</code> — <code class='inline'>08+31</code> = <code class='inline'>39</code>
	</p>
	<h2>Position</h2>
	<pre class='indent-c'><code class='block'>X_Beg = S_Width/2-(W_Width+Border_T_Width)/2
Y_Beg = S_Height/2-(W_Width+Border_T_Height)/2</code></pre>
	<h4>Width example</h4>
	<p>
		<code class='inline'>S_Width</code> 1920, <code class='inline'>W_Width</code> 1024:
	</p>
	<pre class='indent-c'><code class='block'>1920/2-(1024+16)/2</code></pre>
	<p>
		<code class='inline'>X_Beg</code> 440.
	</p>
	<pre class='indent-c'><code class='block'>440+1024+16</code></pre>
	<p>
		<code class='inline'>X_End</code> 1480.
	</p>
	<h4>Height example</h4>
	<p>
		<code class='inline'>S_Height</code> 1080, <code class='inline'>W_Height</code> 768:
	</p>
	<pre class='indent-c'><code class='block'>1080/2-(768+39)/2</code></pre>
	<p>
		<code class='inline'>Y_Beg</code> 137.
	</p>
	<pre class='indent-c'><code class='block'>137+768+39</code></pre>
	<p>
		<code class='inline'>Y_End</code> 944.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
