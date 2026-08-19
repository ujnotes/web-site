<div id='message'>
	<p>
		SHA-1 hash of default key.
	</p>
	<p>
		Mac.
	</p>
	<pre class='indent-c'><code class='block'>keytool -exportcert -alias androiddebugkey -keystore ~/.android/debug.keystore -list -v</code></pre>
	<p>
		Windows.
	</p>
	<pre class='indent-c'><code class='block'>"%JAVA_HOME%"\bin\keytool -list -v -keystore %HOMEPATH%/.android/debug.keystore</code></pre>
	<p>
		Does not have password.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
