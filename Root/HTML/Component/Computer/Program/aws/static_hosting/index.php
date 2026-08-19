<div id='message'>
	<p>
		S3.
	</p>
	<p>
		Enable static hosting.
	</p>
	<p>
		Specify index file.
	</p>
	<pre class='indent-c'><code class='block'>Change bucket name: &lt;sub_domain&gt;.&lt;domain&gt;.&lt;tld&gt;</code></pre>
	<p>
		Add public access policy json.
	</p>
	<pre class='indent-c'><code class='block'>Map cname: &lt;sub_domain&gt; : &lt; aws domain -- &lt;sub_domain&gt;.&lt;domain&gt;.&lt;tld&gt;.aws.com &gt;</code></pre>
	<h2>Enable CDN (cloudflare) proxy</h2>
	<p>
		It must remain on - else will result in certificate SAN missing error.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
