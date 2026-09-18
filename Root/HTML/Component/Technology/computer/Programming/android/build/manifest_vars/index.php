<div id='message'>
	<p>
		Manifest Vars: ApplicationInfo ai = getPackageManager().getApplicationInfo(, and &lt;var&gt; = bundle.getString(\"&lt;key&gt;\");.
	</p>
	<p>
		http://developer.android.com/guide/topics/manifest/meta-data-element.html
	</p>
	<pre class='indent-c'><code class='block'>ApplicationInfo ai = getPackageManager().getApplicationInfo(</code></pre>
	<p>
		GetPackageName(), PackageManager.GET_META_DATA);.
	</p>
	<p>
		Bundle bundle = ai.metaData;.
	</p>
	<pre class='indent-c'><code class='block'>&lt;var&gt; = bundle.getString("&lt;key&gt;");</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
