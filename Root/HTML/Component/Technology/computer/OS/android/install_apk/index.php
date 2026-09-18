<div id='message'>
	<p>
		Start adb, list devices, remount, and install an APK.
	</p>
	<pre class='indent-c'><code class='block'>adb start-server
adb devices
adb remount
adb install [.apk name].apk</code></pre>
	<p>
		Caution: <code class='inline'>adb remount</code> remounts the system partition.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
