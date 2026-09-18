<div id='message'>
	<ol class="list-number content-list">
		<li><div>Place the support library jar in the lib directory of project.</div></li>
	</ol>
	<p>
		[sdk-dir]/extras/android/support/v4/android-support-v4.jar.
	</p>
	<ol class="list-number content-list">
		<li><div>AndroidManifest.xml.</div></li>
	</ol>
	<pre class='indent-c'><code class='block'>&lt;uses-sdk android:minSdkVersion="4" android:targetSdkVersion="17" /&gt;</code></pre>
	<ol class="list-number content-list">
		<li><div>Import the support version instead of the original.</div></li>
	</ol>
	<p>
		Imports android.support.v4.app.SearchViewCompat;.
	</p>
	<p>
		Uses this line...
	</p>
	<p>
		Imports android.widget.SearchView;.
	</p>
	<p>
		Not this line!
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
