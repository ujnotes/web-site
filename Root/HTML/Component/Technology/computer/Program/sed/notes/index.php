<div id='message'>
	<pre class='indent-c'><code class='block'>Replace all &lt;prev&gt; with &lt;new&gt;</code></pre>
	<pre class='indent-c'><code class='block'>‘s/&lt;prev&gt;/&lt;new&gt;/[g]’ &lt;input_file&gt; &gt; &lt;output_file&gt;</code></pre>
	<p>
		Can use ‘|’ instead of ‘/’.
	</p>
	<h2>i</h2>
	<p>
		Inplace.
	</p>
	<p>
		Replace and save the same file.
	</p>
	<p>
		Backup is created if extension is supplied.
	</p>
	<h2>e</h2>
	<pre class='indent-c'><code class='block'>script - additional commands to be executed</code></pre>
	<h2>Multiple</h2>
	<pre class='indent-c'><code class='block'>Multiple -e ‘s/&lt;prev_1&gt;/&lt;new_1&gt;/g’ -e ‘s/&lt;prev_2&gt;/&lt;new_2&gt;/g’</code></pre>
	<pre class='indent-c'><code class='block'>'&lt;n&gt;d'</code></pre>
	<p>
		Deletes nth line.
	</p>
	<h2>Escape</h2>
	<pre class='indent-c'><code class='block'>/\/ &gt; \</code></pre>
	<h2>Replace with new line</h2>
	<pre class='indent-c'><code class='block'>echo "a,b" | sed -e $'s/,/\\\n/g'</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
