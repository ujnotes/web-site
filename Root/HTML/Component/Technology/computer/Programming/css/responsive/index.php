<div id='message'>
	<p>
		@media.
	</p>
	<p>
		Only screen.
	</p>
	<p>
		<strong>and (min-device-width.</strong> 320px).
	</p>
	<p>
		<strong>and (max-device-width.</strong> 480px).
	</p>
	<pre class='indent-c'><code class='block'>min-width</code></pre>
	<pre class='indent-c'><code class='block'>max-width</code></pre>
	<h2>(min-device-width: 320px) and (max-device-width: 480px) {</h2>
	<pre class='indent-c'><code class='block'>/* iPhone, Android rules here */</code></pre>
	<p>
		<strong>orientation.</strong> Landscape.
	</p>
	<p>
		{.
	</p>
	<p>
		Image (dynamic source per requirement).
	</p>
	<p>
		SrcSet.
	</p>
	<p>
		https://css-tricks.com/responsive-images-youre-just-changing-resolutions-use-srcset
	</p>
	<pre class='indent-c'><code class='block'>&lt;img src="small.jpg" srcset="medium.jpg 1000w, large.jpg 2000w" alt="yah"&gt;</code></pre>
	<p>
		Browser select best image.
	</p>
	<h2>Prevent reflow</h2>
	<p>
		http://andmag.se/2012/10/responsive-images-how-to-prevent-reflow/
	</p>
	<p>
		https://www.sitepoint.com/maintain-image-aspect-ratios-responsive-web-design/
	</p>
	<h2>Set container div for img</h2>
	<p>
		<strong>position.</strong> Relative (default).
	</p>
	<p>
		<strong>height.</strong> 0.
	</p>
	<pre class='indent-c'><code class='block'>padding-&lt;top/bottom&gt;: H/W*100%</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
