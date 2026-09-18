<div id='message'>
	<h2>@Override</h2>
	<pre class='indent-c'><code class='block'>@Override public boolean onCreateOptionsMenu(Menu &lt;menu&gt;) {</code></pre>
	<p>
		MenuInflater inflater = getMenuInflater();.
	</p>
	<pre class='indent-c'><code class='block'>inflater.inflate(R.&lt;&gt;, &lt;menu&gt;);</code></pre>
	<p>
		Return true;.
	</p>
	<p>
		}.
	</p>
	<p>
		@Override.
	</p>
	<h2>public boolean onOptionsItemSelected(MenuItem item) {</h2>
	<p>
		Handle item selection.
	</p>
	<h4>switch (item.getItemId()) {</h4>
	<pre class='indent-c'><code class='block'>switch (item.getItemId()) { case R.id.&lt;menu_item_n&gt;:</code></pre>
	<p>
		Intent enter = new Intent(HomeActivity.this, SplashActivity.class);.
	</p>
	<p>
		HomeActivity.this.startActivity(enter);.
	</p>
	<p>
		HomeActivity.this.finish();.
	</p>
	<p>
		Return true;.
	</p>
	<h4>case R.id.main_menu_actionAbout</h4>
	<p>
		Return true;.
	</p>
	<h4>default</h4>
	<p>
		Return super.onOptionsItemSelected(item);.
	</p>
	<p>
		}.
	</p>
	<p>
		}.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
