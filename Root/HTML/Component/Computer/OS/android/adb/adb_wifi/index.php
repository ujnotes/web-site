<div id='message'>
	<p>
		Run ADB over WiFi after USB debugging is working. Default TCP port is 5555.
	</p>
	<h2>Setup</h2>
	<ol class="list-number content-list">
		<li><div>Download and install the Google USB driver from SDK Manager.</div></li>
		<li><div>Install the vendor-specific driver.</div></li>
		<li><div>Enable USB debugging on the device.</div></li>
	</ol>
	<h2>Connect</h2>
	<h4>SU</h4>
	<p>
		On a rooted device:
	</p>
	<pre class='indent-c'><code class='block'>su
setprop service.adb.tcp.port 5555
stop adbd
start adbd</code></pre>
	<h4>Non-SU</h4>
	<ol class="list-number content-list">
		<li><div>Connect via USB and list devices:</div></li>
	</ol>
	<pre class='indent-c'><code class='block'>adb devices</code></pre>
	<ol class="list-number content-list">
		<li><div>Restart ADB on the client (debugger) in TCP mode. Default port is 5555. Compulsory on Mac:</div></li>
	</ol>
	<pre class='indent-c'><code class='block'>adb tcpip [port]
adb tcpip 5555</code></pre>
	<p>
		It should say restarting in TCPIP mode. Another program using ADB, like Android Studio, should not be running.
	</p>
	<ol class="list-number content-list">
		<li><div>Disconnect USB.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>Reconnect to ADB on WiFi. Example IP <code class='inline'>192.168.1.31</code>. Default port is 5555:</div></li>
	</ol>
	<pre class='indent-c'><code class='block'>adb connect &lt;IP&gt;[:port]</code></pre>
	<h2>Reconnect on USB</h2>
	<pre class='indent-c'><code class='block'>adb usb</code></pre>
	<p>
		<code class='inline'>kill-server</code> if ADB is already running.
	</p>
	<h2>Backup</h2>
	<pre class='indent-c'><code class='block'>backup -f ~/data.ab -noapk app.package.name</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
