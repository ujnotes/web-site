<div id='message'>
	<p>
		The Web Proxy Autodiscovery Protocol (WPAD) is a method used by clients to locate a proxy autoconfig file automatically and use this to configure the web browser's proxy settings.
	</p>
	<p>
		The WPAD standard defines two alternative methods the system administrator can use to publish the location of the proxy configuration file: the Dynamic Host Configuration Protocol (DHCP) or the Domain Name System (DNS).
	</p>
	<p>
		Before fetching its first page, a web browser implementing this method sends the local DHCP server a DHCPINFORM query, and uses the URL from the WPAD option in the server's reply. If the DHCP server does not provide the desired information, DNS is used. If, for example, the network name of the user's computer is <code class='inline'>pc.department.branch.example.com</code>, the web browser will try the following URLs in turn until it finds a proxy configuration file within the domain of the client:
	</p>
	<pre class='indent-c'><code class='block'>http://wpad.department.branch.example.com/wpad.dat
http://wpad.branch.example.com/wpad.dat
http://wpad.example.com/wpad.dat</code></pre>
	<h2>Requirements</h2>
	<p>
		In order for WPAD to work, a few requirements have to be met:
	</p>
	<p>
		If you want to use DHCP, then the DHCP must be configured to serve up the "site-local" option 252 (<code class='inline'>auto-proxy-config</code>) with a string value of <code class='inline'>http://xxx.yyy.zzz.qqq/wpad.dat</code> (without the quotes) where <code class='inline'>xxx.yyy.zzz.qqq</code> is the address of a web server (either IP address or DNS).
	</p>
	<p>
		If you want to use DNS, then a DNS entry is needed for a host named WPAD.
	</p>
	<p>
		The host WPAD must be able to serve a web page.
	</p>
	<p>
		The file named <code class='inline'>wpad.dat</code> must be located in the WPAD website's root directory.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
