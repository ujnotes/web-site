<div id='message'>
	<p>
		Separation of concerns.
	</p>
	<p>
		Convention over configuration.
	</p>
	<h2>MVC</h2>
	<h4>Model</h4>
	<p>
		Class.
	</p>
	<p>
		Operations.
	</p>
	<h4>View</h4>
	<pre class='indent-c'><code class='block'>View &lt;controller:action&gt;.gsp</code></pre>
	<pre class='indent-c'><code class='block'>&lt;g: &gt; &lt;/g&gt;</code></pre>
	<p>
		Term interchangeable with gsp.
	</p>
	<p>
		Display / render.
	</p>
	<p>
		Gsp.
	</p>
	<h2>Inline: Specific gsp</h2>
	<p>
		Render (view:'index.gsp').
	</p>
	<h4>when action does not ‘render’</h4>
	<p>
		Gsp of same name is rendered.
	</p>
	<h2>Layout template</h2>
	<p>
		Views\layouts.
	</p>
	<h2>Controller</h2>
	<pre class='indent-c'><code class='block'>Controller &lt;id&gt;&lt;Controller&gt; {</code></pre>
	<pre class='indent-c'><code class='block'>&lt;view&gt;() {</code></pre>
	<p>
		}.
	</p>
	<p>
		}.
	</p>
	<h4>Routing</h4>
	<p>
		External to system.
	</p>
	<h2>URL</h2>
	<pre class='indent-c'><code class='block'>URL context/&lt;controller&gt;/&lt;action&gt;</code></pre>
	<h4>default</h4>
	<p>
		<strong>Action.</strong> Index.
	</p>
	<h2>also accessible by</h2>
	<pre class='indent-c'><code class='block'>/index</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
