<div id='message'>
	<pre class='indent-c'><code class='block'>FileReader fileReader = new FileReader(&lt;fileName&gt;);</code></pre>
	<p>
		Final String UTF8_BOM = "\uFEFF";.
	</p>
	<pre class='indent-c'><code class='block'>InputStreamReader iStreamReader = new InputStreamReader(new FileInputStream(&lt;path&gt;), "UTF-16");</code></pre>
	<p>
		BufferedReader bufferedReader = new BufferedReader(iStreamReader);.
	</p>
	<p>
		Char[] cBuf = new char[2];.
	</p>
	<h2>if(!cBuf.toString().equals(UTF8_BOM))</h2>
	<p>
		System.out.println("Incorrect UTF-8 file; no BOM");.
	</p>
	<p>
		BufferedReader.read(cBuf, 0, 2);.
	</p>
	<pre class='indent-c'><code class='block'>while ((&lt;line&gt; = bufferedReader.readLine()) != null) {</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
