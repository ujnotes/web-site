<div id='message'>
	<p>
		Working notes on Network: Delete ghost adapter names, Network profiles, and Route IP.
	</p>
	<h2>Topics</h2>
	<h4>Delete ghost adapter names</h4>
	<p>
		Remove ghosted network adapter entries by deleting matching GUIDs from Control\Network and Tcpip together.
	</p>
	<h4>Network profiles</h4>
	<p>
		Rename or delete network profiles in the registry, and stop USB tethering from creating a new profile each connect.
	</p>
	<h4>Route IP</h4>
	<p>
		Bind an extra IP to the loopback adapter with netsh int ip add addr, and remove it.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
