<div id='message'>
	<p>
		HttpPost request = new HttpPost();.
	</p>
	<pre class='indent-c'><code class='block'>List&lt;NameValuePair&gt; params = new ArrayList&lt;NameValuePair&gt;();</code></pre>
	<p>
		Params.add(new BasicNameValuePair("key", "value"));.
	</p>
	<p>
		Request.setEntity(new UrlEncodedFormEntity(params));.
	</p>
	<p>
		HttpClient.execute(request);.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
