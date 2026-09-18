<div id='message'>
	<pre class='indent-c'><code class='block'>&lt;Context&gt;&lt;Environment name="mykey" value="myvalue" type="java.lang.String"/&gt;&lt;/Context&gt;</code></pre>
	<p>
		Object object = ((Context)(new InitialContext().lookup("java:comp/env")).lookup("mykey");.
	</p>
	<p>
		Handling NamingException.
	</p>
	<p>
		Public String getFromEnvironment(final String name).
	</p>
	<p>
		{.
	</p>
	<p>
		If(name == null) return null;.
	</p>
	<p>
		Try.
	</p>
	<p>
		{.
	</p>
	<p>
		Final Object object = ((Context)(new InitialContext().lookup("java:comp/env"))).lookup(name);.
	</p>
	<p>
		If (object != null) return object.toString();.
	</p>
	<p>
		} catch (final Exception e) {}.
	</p>
	<p>
		Return System.getenv(name);.
	</p>
	<p>
		}.
	</p>
	<p>
		<strong>JUnit test.</strong> The naming bits used by Tomcat are in a JAR file not in the TOMCAT_HOME/lib, but instead in the TOMCAT_HOME/bin/tomcat-juli.jar file!.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
