<div id='message'>
	<h2>1. Primitives and Objects thru</h2>
	<ol class="list-number content-list">
		<li><div>Primitive assignment actually creates disconnected copies.</div></li>
	</ol>
	<h2>Shallow copy</h2>
	<p>
		Only first level variables are disconnected.
	</p>
	<p>
		Deeper variables are still connected.
	</p>
	<p>
		This is because the first level variables are ‘primitives’.
	</p>
	<h2>Deep copy</h2>
	<p>
		All variables are disconnected.
	</p>
	<p>
		Obtainable by parsing and reverse parsing the object through traversing.
	</p>
	<pre class='indent-c'><code class='block'>var &lt;new&gt; = {...&lt;old&gt;}</code></pre>
	<p>
		https://www.javascripttutorial.net/object/3-ways-to-copy-objects-in-javascript
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
