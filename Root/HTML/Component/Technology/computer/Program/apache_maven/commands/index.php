<div id='message'>
	<p>
		Mvn clean.
	</p>
	<p>
		Mvn clean install.
	</p>
	<p>
		Mvn compile.
	</p>
	<h2>mvn package</h2>
	<p>
		<strong>Export to say.</strong> War.
	</p>
	<pre class='indent-c'><code class='block'>mvn install:install-file -Dfile=&lt;non-maven-proj&gt;.jar -DgroupId=&lt;some.group&gt; -DartifactId=&lt;non-maven-proj&gt; -Dversion=1 -Dpackaging=jar</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
