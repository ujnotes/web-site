<div id='message'>
	<h2>Local test</h2>
	<pre class='indent-c'><code class='block'>/test/</code></pre>
	<p>
		Labeled as ‘tests’.
	</p>
	<p>
		If the test does not depend on Android SDK.
	</p>
	<p>
		Does not require emulator / device.
	</p>
	<p>
		http://stackoverflow.com/questions/33782401/failed-to-resolve-error23-17-junitjunit4-12-in-android-studio-1-4
	</p>
	<h2>Issue junit not found</h2>
	<p>
		Top level gradle.
	</p>
	<h2>allprojects {</h2>
	<p>
		&lt;-- required!!!
	</p>
	<h4>repositories {</h4>
	<p>
		Jcenter().
	</p>
	<p>
		}.
	</p>
	<p>
		}.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
