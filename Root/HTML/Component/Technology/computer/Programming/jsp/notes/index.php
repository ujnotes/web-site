<div id='message'>
	<h2>Buffer</h2>
	<pre class='indent-c'><code class='block'>&lt;out&gt; = pageContext.getOut()</code></pre>
	<pre class='indent-c'><code class='block'>&lt;out&gt; &lt;out&gt;.getBufferSize()</code></pre>
	<h2>Disable</h2>
	<pre class='indent-c'><code class='block'>Disable &lt;%@ page buffer="none" %&gt;</code></pre>
	<h2>Write to out</h2>
	<p>
		Private void myFuncX(String sBits, javax.servlet.jsp.JspWriter myOut).
	</p>
	<h4>{</h4>
	<pre class='indent-c'><code class='block'>{ try{ myOut.println("&lt;div&gt;" + sBits + "&lt;/div&gt;"); }</code></pre>
	<p>
		Catch(Exception eek) { }.
	</p>
	<p>
		}.
	</p>
	<h2>Comments</h2>
	<pre class='indent-c'><code class='block'>&lt;%-- --%&gt;</code></pre>
	<h2>Application path</h2>
	<p>
		Application.getRealPath("&lt;application_scope_path").
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
