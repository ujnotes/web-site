<div id='message'>
	<p>
		Mac.
	</p>
	<pre class='indent-c'><code class='block'>keytool -exportcert -alias androiddebugkey -keystore ~/.android/debug.keystore -list -v</code></pre>
	<h2>Windows</h2>
	<pre class='indent-c'><code class='block'>"%JAVA_HOME%"\bin\keytool -list -v -keystore %HOMEPATH%/.android/debug.keystore</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
