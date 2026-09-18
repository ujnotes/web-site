<div id='message'>
	<p>
		http://vikeninvest.com/?p=476
	</p>
	<h2>1. Copy service script</h2>
	<pre class='indent-c'><code class='block'>1. cp /etc/init.d/ tomcat7 [tomcat-]&lt;&gt;</code></pre>
	<h2>2. Remove base service script</h2>
	<h4>1. rm</h4>
	<p>
		/etc/init.d/tomcat7
	</p>
	<h2>3. Uninstall base script</h2>
	<ol class="list-number content-list">
		<li><div>update-rc.d tomcat7 disable.</div></li>
	</ol>
	<h2>4. Install services scripts</h2>
	<pre class='indent-c'><code class='block'>1. sudo update-rc.d [tomcat-]&lt;&gt; defaults 90</code></pre>
	<h2>5. Set specific directories</h2>
	<pre class='indent-c'><code class='block'>1. /var/lib/tomcat-&lt;&gt;</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
