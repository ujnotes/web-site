<div id='message'>
	<h2>Begin Document with</h2>
	<pre class='indent-c'><code class='block'>&lt;!DocType=HTML&gt;</code></pre>
	<ul class="list-bullet content-list">
		<li><div>so that its not in Quirks mode.</div></li>
	</ul>
	<h2>HTML 5</h2>
	<pre class='indent-c'><code class='block'>&lt;!DOCTYPE html&gt;</code></pre>
	<p>
		Since it is not based on SGML - requires no dtd.
	</p>
	<h2>HTML 4.1</h2>
	<h4>Strict</h4>
	<p>
		&lt;!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN".
	</p>
	<p>
		"http://www.w3.org/TR/html4/strict.dtd"&gt;.
	</p>
	<p>
		________________.
	</p>
	<pre class='indent-c'><code class='block'>&lt;meta  charset="UTF-8"&gt;</code></pre>
	<p>
		CSS.
	</p>
	<pre class='indent-c'><code class='block'>&lt;link rel="stylesheet" type="text/css" href="mystyle.css"&gt;</code></pre>
	<h2>Infile</h2>
	<pre class='indent-c'><code class='block'>Infile &lt;style&gt;&lt;/style&gt;</code></pre>
	<p>
		________________.
	</p>
	<p>
		JS.
	</p>
	<pre class='indent-c'><code class='block'>&lt;script type="text/javascript" async="" src="//_.js"&gt;&lt;/script&gt;</code></pre>
	<p>
		________________.
	</p>
	<h2>Comment</h2>
	<pre class='indent-c'><code class='block'>&lt;!-- … --&gt;</code></pre>
	<p>
		________________.
	</p>
	<p>
		<strong>Box Model.</strong> Content &gt; Padding &gt; Border &gt; Margin.
	</p>
	<h2>Size (Width x Height) Specify only Content Dimension</h2>
	<p>
		This is not true in Quirks mode + prior versions of IE than 6.
	</p>
	<h4>This can be overridden by - box-sizing</h4>
	<pre class='indent-c'><code class='block'>border-box &amp; Gecko Specific "-moz-box-sizing"</code></pre>
	<h2>In order to let old browsers bypass JS</h2>
	<pre class='indent-c'><code class='block'>After &lt;Script&gt; tag</code></pre>
	<p>
		&lt;!-- This can live in both.
	</p>
	<p>
		….
	</p>
	<p>
		--&gt; so that JS skips.
	</p>
	<pre class='indent-c'><code class='block'>&lt;/script&gt;</code></pre>
	<p>
		________________.
	</p>
	<pre class='indent-c'><code class='block'>&lt;meta http-equiv="X-UA-Compatible" content="IE=edge"&gt;</code></pre>
	<ul class="list-bullet content-list">
		<li><div>"IE=edge".</div></li>
	</ul>
	<ul class="list-bullet content-list">
		<li><div>"IE=9".</div></li>
	</ul>
	<ul class="list-bullet content-list">
		<li><div>"IE=EmulateIE9.</div></li>
	</ul>
	<ul class="list-bullet content-list">
		<li><div>"IE=8".</div></li>
	</ul>
	<ul class="list-bullet content-list">
		<li><div>"IE=EmulateIE8".</div></li>
	</ul>
	<ul class="list-bullet content-list">
		<li><div>"IE=7".</div></li>
	</ul>
	<ul class="list-bullet content-list">
		<li><div>"IE=EmulateIE7".</div></li>
	</ul>
	<ul class="list-bullet content-list">
		<li><div>"IE=5".</div></li>
	</ul>
	<p>
		Emulate respects specific directives ulike pures.
	</p>
	<p>
		________________.
	</p>
	<h2>Open Link in New Tab|Window</h2>
	<p>
		Target="_blank".
	</p>
	<p>
		*Same ‘Target’ will replace.
	</p>
	<p>
		________________.
	</p>
	<pre class='indent-c'><code class='block'>&lt;!--[if lt IE 9]&gt;&lt;div style="position:fixed;top:0;left:0;right:0;bottom:0;background:black;z-index:999999999;text-align:center;"&gt;&lt;a href="http://godarkforie.org/upgrade?lang=en"&gt;&lt;img src="http://godarkforie.org/splash/en.jpg" alt="You are using an old version of Internet Explorer" /&gt;&lt;/a&gt;&lt;/div&gt;&lt;![endif]--&gt;</code></pre>
	<p>
		________________.
	</p>
	<pre class='indent-c'><code class='block'>&lt;meta http-equiv="Content-type" content="text/html; charset=utf-8" /&gt;</code></pre>
	<p>
		________________.
	</p>
	<p>
		Sunken Text.
	</p>
	<p>
		<strong>text-shadow.</strong> White 0px 1px 0px;.
	</p>
	<p>
		________________.
	</p>
	<h2>Text Shadow</h2>
	<p>
		<strong>text-shadow.</strong> 0 1px 1px rgba(0,0,0,0.1);.
	</p>
	<p>
		________________.
	</p>
	<pre class='indent-c'><code class='block'>&lt;details&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;details&gt; &lt;summary&gt;&lt;em&gt;Additionally...&lt;/em&gt;&lt;/summary&gt;</code></pre>
	<p>
		...
	</p>
	<pre class='indent-c'><code class='block'>&lt;summary&gt;&lt;em&gt;Additionally...&lt;/em&gt;&lt;/summary&gt; &lt;/details&gt;</code></pre>
	<p>
		________________.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
