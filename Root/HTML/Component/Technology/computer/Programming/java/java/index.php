<div id='message'>
	<h2>try</h2>
	<p>
		Process p = Runtime.getRuntime().exec("cmd /c dir");.
	</p>
	<h4>BufferedReader in = new BufferedReader(</h4>
	<p>
		New InputStreamReader(p.getInputStream()));.
	</p>
	<p>
		String line = null;.
	</p>
	<pre class='indent-c'><code class='block'>while ((line = in.readLine()) != null)</code></pre>
	<p>
		System.out.println(line);.
	</p>
	<pre class='indent-c'><code class='block'>}.</code></pre>
	<pre class='indent-c'><code class='block'>} catch (IOException e)</code></pre>
	<p>
		E.printStackTrace();.
	</p>
	<pre class='indent-c'><code class='block'>}.</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
