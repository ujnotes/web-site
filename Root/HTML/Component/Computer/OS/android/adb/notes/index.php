<div id='message'>
	<p>
		Push a file onto the device:
	</p>
	<pre class='indent-c'><code class='block'>adb push filename.extension /sdcard/0/</code></pre>
	<p>
		Other destinations:
	</p>
	<pre class='indent-c'><code class='block'>/data/local/
/data/opt/
/data/tmp/</code></pre>
	<p>
		Set a system property from the shell. Value may be empty <code class='inline'>""</code>:
	</p>
	<pre class='indent-c'><code class='block'>adb shell setprop &lt;Property&gt; &lt;Value|""&gt;</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
