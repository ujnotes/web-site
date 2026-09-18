<div id='message'>
	<h2>Follow Symbolic Link</h2>
	<p>
		Context.xml.
	</p>
	<pre class='indent-c'><code class='block'>&lt;Context override="true" allowLinking="true"&gt;</code></pre>
	<ul class="list-bullet content-list">
		<li><div>Did not work in Apache Tomcat - Win 7 - Used HardLinks instead.</div></li>
	</ul>
	<h2>ServerRoot</h2>
	<h4>/</h4>
	<pre class='indent-c'><code class='block'>/Program Files/Apache/httpd</code></pre>
	<h2>&lt;Directory htdocs</h2>
	<p>
		AllowOverride All.
	</p>
	<p>
		LoadModule modRewrite.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
