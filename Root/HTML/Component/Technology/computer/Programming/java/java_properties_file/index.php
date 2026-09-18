<div id='message'>
	<p>
		Working notes on Java Properties file.
	</p>
	<p>
		Imports java.io.FileInputStream;.
	</p>
	<p>
		Imports java.io.FileNotFoundException;.
	</p>
	<p>
		Imports java.io.InputStream;.
	</p>
	<p>
		Imports java.io.IOException;.
	</p>
	<p>
		Imports java.util.Properties;.
	</p>
	<p>
		Public class PropertiesExample.
	</p>
	<p>
		##
	</p>
	<p>
		Public static void main(String[] args).
	</p>
	<p>
		###
	</p>
	<p>
		Properties prop = new Properties();.
	</p>
	<p>
		Try.
	</p>
	<p>
		###
	</p>
	<p>
		String fileName = "app.config";.
	</p>
	<p>
		InputStream is = new FileInputStream(fileName);.
	</p>
	<p>
		Prop.load(is);.
	</p>
	<p>
		System.out.println(prop.getProperty("app.name"));.
	</p>
	<p>
		System.out.println(prop.getProperty("app.version"));.
	</p>
	<p>
		System.out.println(prop.getProperty("app.vendor", "Code Java"));.
	</p>
	<p>
		Default.
	</p>
	<pre class='indent-c'><code class='block'>}.</code></pre>
	<p>
		Catch (FileNotFoundException e).
	</p>
	<p>
		##
	</p>
	<p>
		E.printStackTrace();.
	</p>
	<pre class='indent-c'><code class='block'>}.</code></pre>
	<p>
		Catch (IOException e).
	</p>
	<p>
		##
	</p>
	<p>
		E.printStackTrace();.
	</p>
	<pre class='indent-c'><code class='block'>}.</code></pre>
	<pre class='indent-c'><code class='block'>}.</code></pre>
	<pre class='indent-c'><code class='block'>}.</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
