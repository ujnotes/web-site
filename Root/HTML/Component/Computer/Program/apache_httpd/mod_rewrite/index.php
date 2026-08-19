<div id='message'>
	<h2>References</h2>
	<p>
		https://httpd.apache.org/docs/current/rewrite/flags.html
	</p>
	<p>
		http://httpd.apache.org/docs/current/mod/mod_rewrite.html
	</p>
	<pre class='indent-c'><code class='block'>RewriteEngine                &lt;On|Off&gt;</code></pre>
	<h2>RewriteBase</h2>
	<p>
		/.
	</p>
	<p>
		/|.
	</p>
	<p>
		Else all paths must be preceded by ‘/’.
	</p>
	<pre class='indent-c'><code class='block'>RewriteRule &lt;regex&gt; &lt;target&gt; [[Flags[,...]]]</code></pre>
	<h2>Example</h2>
	<h2>RewriteRule</h2>
	<p>
		^/zz$ /X.html [PT].
	</p>
	<p>
		Without RewriteBase.
	</p>
	<h2>Test</h2>
	<p>
		RewriteRule ^Test$ Testing [R].
	</p>
	<p>
		Simple Internal Redirect.
	</p>
	<p>
		Default.
	</p>
	<p>
		That is, no flag.
	</p>
	<p>
		External Redirect.
	</p>
	<h2>RewriteRule</h2>
	<p>
		^/foo\.html$ bar.html [R].
	</p>
	<h2>Flags</h2>
	<pre class='indent-c'><code class='block'>_[_ &lt;flag[,]&gt;</code></pre>
	<p>
		No space to separate.
	</p>
	<p>
		Comma separated.
	</p>
	<p>
		N and NC are entirely different.
	</p>
	<h2>NC</h2>
	<p>
		No case.
	</p>
	<p>
		Case insensitive.
	</p>
	<h2>N</h2>
	<p>
		Begin re-evaluation from the beginning with present.
	</p>
	<p>
		! can result in a loop.
	</p>
	<p>
		R.
	</p>
	<h2>L</h2>
	<p>
		Last.
	</p>
	<p>
		Terminate further evaluation.
	</p>
	<p>
		Rewrite rules are recursed.
	</p>
	<h2>RewriteLogLevel</h2>
	<p>
		[&gt;= 6].
	</p>
	<h2>RewriteLog</h2>
	<p>
		SYSOUT.
	</p>
	<pre class='indent-c'><code class='block'>RewriteDocument        &lt;ErrorNo&gt;        “Message”|URL</code></pre>
	<p>
		Rewrite condition.
	</p>
	<pre class='indent-c'><code class='block'>RewriteCond &lt;expression&gt; -&lt;test&gt; &lt;combination&gt;</code></pre>
	<pre class='indent-c'><code class='block'>RewriteCond &lt;RewriteRule&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;expression&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;expression&gt; Variables : %{&lt;variable&gt;}</code></pre>
	<h2>REQUEST_FILENAME</h2>
	<p>
		Full path of the request.
	</p>
	<pre class='indent-c'><code class='block'>C:/_/..        Windows</code></pre>
	<h2>REQUEST_URI</h2>
	<p>
		Path after first slash.
	</p>
	<pre class='indent-c'><code class='block'>&lt;test&gt;</code></pre>
	<p>
		‘!’ for inversion.
	</p>
	<pre class='indent-c'><code class='block'>-&lt;operator&gt;</code></pre>
	<h2>operator</h2>
	<h4>f</h4>
	<p>
		File.
	</p>
	<h4>d</h4>
	<p>
		Directory.
	</p>
	<pre class='indent-c'><code class='block'>&lt;combination&gt;</code></pre>
	<p>
		‘[OR]’.
	</p>
	<p>
		Cascading conditions for a single rule.
	</p>
	<p>
		<strong>Tip.</strong> To debug you may print the expanded condition expression by using it in a rewriterule target.
	</p>
	<p>
		?requestURI got repeated a few times?
	</p>
	<p>
		________________.
	</p>
	<h2>Redirect 404 /</h2>
	<p>
		Redirects 404 errors to page.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
