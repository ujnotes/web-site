<div id='message'>
	<p>
		Use an elevated command prompt.
	</p>
	<h2>Driver</h2>
	<pre class='indent-c'><code class='block'>netsh wlan show drivers</code></pre>
	<p>
		If Hosted network is supported, the output shows <code class='inline'>supported == Yes</code>.
	</p>
	<h2>Hosted network</h2>
	<pre class='indent-c'><code class='block'>netsh wlan set hostednetwork mode=allow ssid=&lt;enter_network_name_here&gt; key=&lt;enter_password_here&gt;
netsh wlan start hostednetwork
netsh wlan show hostednetwork</code></pre>
	<p>
		You may enable ICS.
	</p>
	<p>
		Caution: hosted network setup needs an elevated command prompt.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
