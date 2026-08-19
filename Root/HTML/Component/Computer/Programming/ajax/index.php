<div id='message'>
		<p>
		Ways to return content through XMLHTTPRequest: plain text, JavaScript variables, JSON objects, and XML.
	</p>
	<h2>Returning content through XMLHTTPRequest</h2>
	<p>
		There are various ways you can return content through XMLHTTPRequest:
	</p>
	<ul class="list-bullet content-list">
		<li><div>Plain text (<code class='inline'>XML.responseText</code>)</div></li>
		<li><div>Javascript variables (<code class='inline'>eval(XML.responseText)</code>)</div></li>
		<li><div>JSON – Javascript objects (<code class='inline'>eval(XML.responseText)</code>)</div></li>
		<li><div>XML (<code class='inline'>XML.responseText = XML</code>)</div></li>
	</ul>
	<p>
		Of these, plain text is the simplest, as all it requires is servicing a request with a simple plain text dump of data. The downside to this method is that it’s not always a clean way to return more than one variable.
	</p>
	<p>
		Javascript variables are a nice way to return multiple variables through an XMLHTTPRequest call. Instead of dumping plain text, the server decorates the different returned variables with javascript variable declarations. On the client end, the XMLHTTPRequest callback function evals the server response and now has the variables set by the server available to it as native javascript variables.
	</p>
	<p>
		One key part of this method however is remembering to escape the content in the javascript variable assignment.
	</p>
	<p>
		The third way of passing back content through XMLHTTPRequest is XML, which despite the name of the function, is often the slowest and most difficult way due to difficulties parsing xml. However for highly structured content or when E4X becomes more standard, this might be the way to go.
	</p>

</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>