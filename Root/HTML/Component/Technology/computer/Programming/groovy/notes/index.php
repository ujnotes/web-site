<div id='message'>
	<p>
		Loosely typed.
	</p>
	<p>
		Superset of Java.
	</p>
	<p>
		Compiles to bytecode.
	</p>
	<p>
		No semicolon.
	</p>
	<p>
		String ‘’.
	</p>
	<p>
		Eval String “”.
	</p>
	<pre class='indent-c'><code class='block'>Expression in eval string $()</code></pre>
	<pre class='indent-c'><code class='block'>variable / function : def</code></pre>
	<h2>List</h2>
	<p>
		Declare.
	</p>
	<p>
		[].
	</p>
	<h2>Initialize</h2>
	<pre class='indent-c'><code class='block'>Initialize [&lt;&gt;, &lt;&gt; ...]</code></pre>
	<h2>Append</h2>
	<pre class='indent-c'><code class='block'>&lt;&lt; &lt;&gt;</code></pre>
	<h4>Size</h4>
	<p>
		.size().
	</p>
	<h4>Index</h4>
	<pre class='indent-c'><code class='block'>Index [&lt;index&gt;]</code></pre>
	<h4>get</h4>
	<pre class='indent-c'><code class='block'>get .findAll{&lt;expression&gt;}</code></pre>
	<h4>Operate</h4>
	<pre class='indent-c'><code class='block'>Operate *.&lt;function&gt;()</code></pre>
	<p>
		.collect{operation(it)}.
	</p>
	<h2>Map</h2>
	<h4>Declare</h4>
	<p>
		[:].
	</p>
	<h4>Initialize</h4>
	<pre class='indent-c'><code class='block'>Initialize [&lt;&lt;Key&gt;:&lt;Value&gt;&gt;[,...]]</code></pre>
	<p>
		<strong>Key.</strong> String by default.
	</p>
	<p>
		Append.
	</p>
	<p>
		Put.
	</p>
	<p>
		Access.
	</p>
	<p>
		Get.
	</p>
	<h2>Loop</h2>
	<pre class='indent-c'><code class='block'>Loop &lt;Number&gt;.times { &lt; &gt; }</code></pre>
	<pre class='indent-c'><code class='block'>Loop &lt;list/map&gt;.each {&lt;&gt;}</code></pre>
	<pre class='indent-c'><code class='block'>Loop (&lt;&gt;..&lt;&gt;).each {}</code></pre>
	<pre class='indent-c'><code class='block'>Loop &lt;Map&gt;.each { key, value -&gt;        println "${key} = ${value}"</code></pre>
	<h2>Print</h2>
	<pre class='indent-c'><code class='block'>Print .println &lt;string&gt;</code></pre>
	<pre class='indent-c'><code class='block'>Print .render &lt;string&gt;</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
