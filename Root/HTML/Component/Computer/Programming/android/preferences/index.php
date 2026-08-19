<div id='message'>
	<p>
		https://developer.android.com/training/basics/data-storage/shared-preferences.html
	</p>
	<h2>Common</h2>
	<pre class='indent-c'><code class='block'>Common SharedPreferences sharedPref = &lt;Activity&gt;.getPreferences(Context.MODE_PRIVATE);</code></pre>
	<h2>Write</h2>
	<pre class='indent-c'><code class='block'>Write SharedPreferences.Editor &lt;editor&gt; = &lt;sharedPref&gt;.edit();</code></pre>
	<pre class='indent-c'><code class='block'>Write editor.putBoolean(getString(R.string.&lt;key&gt;), &lt;value&gt;);</code></pre>
	<p>
		Editor.apply();.
	</p>
	<p>
		Commit : immediate, blocking.
	</p>
	<h2>Read</h2>
	<p>
		Boolean isAlreadyLaunched;.
	</p>
	<p>
		IsAlreadyLaunched = sharedPref.getBoolean(getString(R.string.launched), false);.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
