<div id='message'>
	<p>
		This is implemented via a URL Rewrite Filter -.
	</p>
	<h2>for TomCat this has to be added</h2>
	<pre class='indent-c'><code class='block'>&lt;filter&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;filter-name&gt;UrlRewriteFilter&lt;/filter-name&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;filter-name&gt;UrlRewriteFilter&lt;/filter-name&gt; &lt;filter-class&gt;org.tuckey.web.filters.urlrewrite.UrlRewriteFilter&lt;/filter-class&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;filter&gt; &lt;init-param&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;param-name&gt;confReloadCheckInterval&lt;/param-name&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;param-name&gt;confReloadCheckInterval&lt;/param-name&gt; &lt;param-value&gt;0&lt;/param-value&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;param-value&gt;0&lt;/param-value&gt; &lt;/init-param&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;init-param&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;param-name&gt;modRewriteConf&lt;/param-name&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;param-name&gt;modRewriteConf&lt;/param-name&gt; &lt;param-value&gt;true&lt;/param-value&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;init-param&gt; &lt;/init-param&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;/init-param&gt; &lt;init-param&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;init-param&gt; &lt;param-name&gt;logLevel&lt;/param-name&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;param-value&gt;DEBUG&lt;/param-value&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;param-name&gt;logLevel&lt;/param-name&gt; &lt;/init-param&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;/init-param&gt; &lt;/filter&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;/filter&gt; &lt;filter-mapping&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;filter-name&gt;UrlRewriteFilter&lt;/filter-name&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;filter-name&gt;UrlRewriteFilter&lt;/filter-name&gt; &lt;url-pattern&gt;/*&lt;/url-pattern&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;url-pattern&gt;/*&lt;/url-pattern&gt; &lt;dispatcher&gt;REQUEST&lt;/dispatcher&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;dispatcher&gt;REQUEST&lt;/dispatcher&gt; &lt;dispatcher&gt;FORWARD&lt;/dispatcher&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;filter-mapping&gt; &lt;/filter-mapping&gt;</code></pre>
	<p>
		To Web.Conf.
	</p>
	<p>
		The Jar file should be placed in the lib directory.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
