<div id='message'>
	<p>
		Filter adb logcat, tag logs with Log.d, and show one tag exclusively with -s.
	</p>
	<p>
		Android logcat: http://developer.android.com/tools/help/logcat.html.
	</p>
	<p>
		Pipe logcat through grep:
	</p>
	<pre class='indent-c'><code class='block'>adb logcat | grep &lt;&gt;</code></pre>
	<p>
		Write a debug line from an activity:
	</p>
	<pre class='indent-c'><code class='block'>Log.d("&lt;Activity&gt;","what you want to log");</code></pre>
	<p>
		Then read that tag only:
	</p>
	<pre class='indent-c'><code class='block'>adb logcat -s &lt;Activity&gt;</code></pre>
	<p>
		<code class='inline'>-s</code> shows that tag exclusively.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
