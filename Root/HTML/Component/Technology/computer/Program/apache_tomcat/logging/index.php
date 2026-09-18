<div id='message'>
	<h2>WEB-INF\Classes\</h2>
	<p>
		Logging.properties.
	</p>
	<p>
		Org.apache.catalina.core.ContainerBase.[Catalina].level = INFO.
	</p>
	<p>
		Org.apache.catalina.core.ContainerBase.[Catalina].handlers = java.util.logging.ConsoleHandler.
	</p>
	<h2>Separate per context</h2>
	<ol class="list-number content-list">
		<li><div>Each application must use its own log4j.jar in WEB-INF/lib of each application.</div></li>
	</ol>
	<pre class='indent-c'><code class='block'>2. In each log4j's configuration file (default location is WEB-INF/classes), specify the log file name, e.g. log4j.appender.AppLog.File=${catalina.home}/logs/app1.log.</code></pre>
	<ol class="list-number content-list">
		<li><div>Add swallowOutput="true" for each context so stdout, stderr will go to your own log.</div></li>
	</ol>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
