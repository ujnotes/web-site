<div id='message'>
	<p>
		Pair and connect ADB over Wireless debugging (no USB step).
	</p>
	<h2>Activate WiFi debugging</h2>
	<p>
		Device Settings &gt; Developer Options &gt; Enable Wireless debugging.
	</p>
	<h2>Pair</h2>
	<p>
		Pair the device with a pairing code:
	</p>
	<pre class='indent-c'><code class='block'>adb pair &lt;ipaddr&gt;:&lt;port&gt;</code></pre>
	<h2>Connect</h2>
	<pre class='indent-c'><code class='block'>adb connect &lt;ipaddr&gt;:&lt;port&gt;</code></pre>
	<p>
		Shows a notification on the device.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
