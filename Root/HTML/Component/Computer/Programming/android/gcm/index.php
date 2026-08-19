<div id='message'>
	<h2>1. Requirements</h2>
	<ol class="list-number content-list">
		<li><div>Google console :: Project Id.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>Enable API :: Get API key.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>Client.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>Server.</div></li>
	</ol>
	<h2>2. Sequence</h2>
	<ol class="list-number content-list">
		<li><div>Client sends Project Id to Google server.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>Client get a GCM key.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>Client relays this to server.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>Client registers it GCM intent listener.</div></li>
	</ol>
	<h4>5. Server sends following request to the GCM server</h4>
	<h4>1. Header</h4>
	<h4>1. Target</h4>
	<ol class="list-number content-list">
		<li><div>Https://android.googleapis.com/gcm/send.</div></li>
	</ol>
	<h4>2. Header</h4>
	<h4>1. Authentication</h4>
	<h4>1. key=</h4>
	<ol class="list-number content-list">
		<li><div>API-key.</div></li>
	</ol>
	<h4>2. content-type</h4>
	<ol class="list-number content-list">
		<li><div>Application/json.</div></li>
	</ol>
	<h4>3. Content</h4>
	<h4>1. registration_ids</h4>
	<ol class="list-number content-list">
		<li><div>(array) [].</div></li>
	</ol>
	<h4>2. data</h4>
	<pre class='indent-c'><code class='block'>1. (aso. array) {</code></pre>
	<ol class="list-number content-list">
		<li><div>Message.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>….</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>Client’s app’s listener receives the notification.</div></li>
	</ol>
	<h2>3. Sound</h2>
	<ol class="list-number content-list">
		<li><div>Notification.sound = Uri.parse("android.resource://" + getPackageName() + "/" +R.raw.pop);.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>Notification.defaults |= Notification.DEFAULT_VIBRATE;.</div></li>
	</ol>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
