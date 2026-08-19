<div id='message'>
	<p>
		Port: iptables -A PREROUTING -t nat -i eth0 -p tcp --dpo.
	</p>
	<p>
		http://stackoverflow.com/questions/24382076/how-to-make-tomcat-run-on-443-instead-of-its-default-port-8080/24382185#24382185
	</p>
	<pre class='indent-c'><code class='block'>iptables -A PREROUTING -t nat -i eth0 -p tcp --dport &lt;global_port&gt; -j REDIRECT --to-port &lt;local_port&gt;</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
