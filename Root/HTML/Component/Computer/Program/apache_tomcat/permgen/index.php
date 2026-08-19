<div id='message'>
	<pre class='indent-c'><code class='block'>-XX:PermSize&lt;size&gt; - Set initial PermGen Size.</code></pre>
	<pre class='indent-c'><code class='block'>-XX:PermSize&lt;size&gt; -XX:MaxPermSize&lt;size&gt; - Set the maximum PermGen Size.</code></pre>
	<h2>Windows</h2>
	<pre class='indent-c'><code class='block'>setenv.bat</code></pre>
	<pre class='indent-c'><code class='block'>set JAVA_OPTS=-Dfile.encoding=UTF-8 -Xms128m -Xmx1024m -XX:PermSize=64m -XX:MaxPermSize=256m</code></pre>
	<h2>Linux</h2>
	<pre class='indent-c'><code class='block'>setenv.sh</code></pre>
	<pre class='indent-c'><code class='block'>export JAVA_OPTS="-Dfile.encoding=UTF-8 -Xms128m -Xmx4024m -XX:PermSize=64m -XX:MaxPermSize=256m"</code></pre>
	<pre class='indent-c'><code class='block'>-XX:+CMSClassUnloadingEnabled -XX:+UseConcMarkSweepGC</code></pre>
	<pre class='indent-c'><code class='block'>-XX:PermSize=128m -XX:MaxPermSize=256m</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
