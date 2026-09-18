<div id='message'>
	<p>
		Notes: Local emulator, Create, Start emulator, Deploy, and Call.
	</p>
	<h2>Local emulator</h2>
	<p>
		https://github.com/GoogleCloudPlatform/cloud-functions-emulator
	</p>
	<p>
		Install.
	</p>
	<pre class='indent-c'><code class='block'>npm install -g @google-cloud/functions-emulator</code></pre>
	<h2>Create</h2>
	<pre class='indent-c'><code class='block'>Create mkdir &lt;Project&gt;</code></pre>
	<pre class='indent-c'><code class='block'>Create cd &lt;Project&gt;</code></pre>
	<pre class='indent-c'><code class='block'>Create echo 'exports.&lt;Project&gt; = (req, res) =&gt; res.send("Hello, World!");' &gt; index.js</code></pre>
	<p>
		Touch index.js.
	</p>
	<h2>Start emulator</h2>
	<p>
		Functions start.
	</p>
	<h2>Deploy</h2>
	<pre class='indent-c'><code class='block'>Deploy functions deploy &lt;project&gt;  --trigger-http</code></pre>
	<h2>Call</h2>
	<pre class='indent-c'><code class='block'>Call functions call &lt;project&gt;</code></pre>
	<h2>Log</h2>
	<p>
		Functions logs read.
	</p>
	<h2>Documentation</h2>
	<pre class='indent-c'><code class='block'>Functions --help</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
