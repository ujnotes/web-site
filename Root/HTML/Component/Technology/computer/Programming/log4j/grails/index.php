<div id='message'>
	<p>
		Imports org.apache.log4j.Logger.
	</p>
	<h2>log4j = {</h2>
	<h4>appenders {</h4>
	<p>
		<strong>console name.</strong> 'stdout', layout: pattern(conversionPattern: conversionPattern).
	</p>
	<pre class='indent-c'><code class='block'>rollingFile name: 'file', file: "${logDirectory}/${appName}.log", layout: pattern(conversionPattern: conversionPattern)</code></pre>
	<pre class='indent-c'><code class='block'>rollingFile name: 'StackTrace', file: "${logDirectory}/${appName}-stacktrace.log"</code></pre>
	<h2>environments {</h2>
	<p>
		Development { root { warn 'stdout' } }.
	</p>
	<p>
		Test { root { warn 'stdout' } }.
	</p>
	<p>
		Production { root { error 'file' } }.
	</p>
	<p>
		}.
	</p>
	<p>
		}.
	</p>
	<p>
		Remove from console.
	</p>
	<p>
		Logrj= {.
	</p>
	<p>
		}.
	</p>
	<h2>def logger = Logger.getRootLogger()</h2>
	<p>
		Logger.removeAppender('stdout').
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
