<div id='message'>
	<h2>Server.xml</h2>
	<pre class='indent-c'><code class='block'>Server.xml &lt;Connector connectionTimeout="20000" port="80" protocol="HTTP/1.1" redirectPort="443"/&gt;</code></pre>
	<p>
		Web.xml.
	</p>
	<pre class='indent-c'><code class='block'>&lt;security-constraint&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;security-constraint&gt; &lt;web-resource-collection&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;web-resource-collection&gt; &lt;web-resource-name&gt;secured&lt;/web-resource-name&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;web-resource-name&gt;secured&lt;/web-resource-name&gt; &lt;url-pattern&gt;/*&lt;/url-pattern&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;url-pattern&gt;/*&lt;/url-pattern&gt; &lt;/web-resource-collection&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;/web-resource-collection&gt; &lt;user-data-constraint&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;user-data-constraint&gt; &lt;transport-guarantee&gt;CONFIDENTIAL&lt;/transport-guarantee&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;transport-guarantee&gt;CONFIDENTIAL&lt;/transport-guarantee&gt; &lt;/user-data-constraint&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;/user-data-constraint&gt; &lt;/security-constraint&gt;</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
