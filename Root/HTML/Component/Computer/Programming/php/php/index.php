<div id='message'>
	<pre class='indent-c'><code class='block'>&lt;?php … ?&gt;</code></pre>
	<p>
		All PHP (including ‘include’ files included in php files) must be enclosed.
	</p>
	<p>
		________________.
	</p>
	<h2>PHP Status</h2>
	<p>
		Phpinfo();.
	</p>
	<p>
		________________.
	</p>
	<p>
		Loosely Typed - variable declaration not required.
	</p>
	<p>
		________________.
	</p>
	<p>
		Include.
	</p>
	<p>
		<strong>include.</strong> Throws warning if file not found (continues execution).
	</p>
	<p>
		<strong>require.</strong> Throws error if file not found (stops execution).
	</p>
	<pre class='indent-c'><code class='block'>&lt;include | require&gt; ‘&lt;path&gt;’;</code></pre>
	<p>
		________________.
	</p>
	<p>
		<strong>variable.</strong> $var1 = ….
	</p>
	<h2>use</h2>
	<p>
		Echo “xyz $var1”;.
	</p>
	<p>
		________________.
	</p>
	<pre class='indent-c'><code class='block'>include / require var</code></pre>
	<p>
		Include ($var1);.
	</p>
	<p>
		________________.
	</p>
	<h2>Concatenate Strings</h2>
	<p>
		.
	</p>
	<p>
		________________.
	</p>
	<p>
		http://localhost/temp/temp.php?a=10&amp;b=glop
	</p>
	<h2>And using</h2>
	<p>
		Var_dump($_SERVER);.
	</p>
	<h2>I get at least</h2>
	<h2>array</h2>
	<p>
		...
	</p>
	<p>
		'HTTP_HOST' =&gt; string 'localhost' (length=9).
	</p>
	<p>
		...
	</p>
	<p>
		'REQUEST_METHOD' =&gt; string 'GET' (length=3).
	</p>
	<p>
		'QUERY_STRING' =&gt; string 'a=10&amp;b=glop' (length=11).
	</p>
	<p>
		'REQUEST_URI' =&gt; string '/temp/temp.php?a=10&amp;b=glop' (length=26).
	</p>
	<p>
		'SCRIPT_NAME' =&gt; string '/temp/temp.php' (length=14).
	</p>
	<p>
		'PHP_SELF' =&gt; string '/temp/temp.php' (length=14).
	</p>
	<p>
		'REQUEST_TIME' =&gt; int 1270060299.
	</p>
	<p>
		__FILE__ - Full path of current file.
	</p>
	<p>
		________________.
	</p>
	<p>
		$dom = new DOMDocument();.
	</p>
	<pre class='indent-c'><code class='block'>$dom-&gt;loadHTMLfile('http://remoteDomain/thispage.html');</code></pre>
	<h2>$table=$dom-&gt;getElementById('myid');</h2>
	<h4>foreach($table-&gt;getElementsByTagName('tr') as</h4>
	<p>
		$key =&gt;$tr){.
	</p>
	<p>
		$tr-&gt;getElementsByTagName('td')-&gt;item(0)-&gt;nodeValue;.
	</p>
	<p>
		}.
	</p>
	<p>
		Eval(PATH).
	</p>
	<p>
		Ob_start();.
	</p>
	<p>
		Include "yourfile.php";.
	</p>
	<p>
		$myvar = ob_get_contents();.
	</p>
	<p>
		Ob_end_clean();.
	</p>
	<p>
		________________.
	</p>
	<p>
		$subject = 'your_input_text';.
	</p>
	<pre class='indent-c'><code class='block'>$matchPattern = '/(&lt;!\[CDATA\[[^[]*)\[(.*?)\]([^\]]*\]\]&gt;)/s';</code></pre>
	<p>
		$replacePattern = '$1$2$3';.
	</p>
	<p>
		$result = preg_replace($matchPattern, $replacePattern, $subject);.
	</p>
	<p>
		________________.
	</p>
	<p>
		$string = str_replace("&lt;![CDATA[","",$string);.
	</p>
	<p>
		$string = str_replace("]]&gt;","",$string);.
	</p>
	<p>
		________________.
	</p>
	<p>
		&lt;?php.
	</p>
	<p>
		$doc = new DOMDocument();.
	</p>
	<p>
		$doc -&gt; loadXML($xmlstring);.
	</p>
	<p>
		$fragment = $doc-&gt;createDocumentFragment();.
	</p>
	<pre class='indent-c'><code class='block'>/* Append the script element to the fragment using raw XML strings (will be preserved in their raw form) and if succesful proceed to insert it in the DOM tree */</code></pre>
	<pre class='indent-c'><code class='block'>/* if($fragment-&gt;appendXML("&lt;script type='text/javascript' src='$source'&gt;&lt;/script&gt;") {</code></pre>
	<p>
		$xpath = new DOMXpath($doc);.
	</p>
	<p>
		Foreach($resultlist as $headnode).
	</p>
	<p>
		Insert the script tag.
	</p>
	<p>
		$headnode-&gt;appendChild($fragment);.
	</p>
	<pre class='indent-c'><code class='block'>$resultlist = $xpath-&gt;query("//*[local-name() = 'html']/*[local-name() = 'head']"); /* namespace-safe method to find all head elements which are childs of the html element, should only return 1 match */</code></pre>
	<p>
		}.
	</p>
	<pre class='indent-c'><code class='block'>$doc-&gt;saveXML(); /* and our script tags will still be &lt;script&gt;&lt;/script&gt; */</code></pre>
	<p>
		?&gt;.
	</p>
	<p>
		________________.
	</p>
	<p>
		Preg_replace('/\r\n/', "\n", ob_get_contents());.
	</p>
	<p>
		$x = eval(file_get_contents("Template.php"));.
	</p>
	<p>
		$list = $dom-&gt;getElementsByTagName('script');.
	</p>
	<h2>foreach ($list as $script) {</h2>
	<pre class='indent-c'><code class='block'>if ($script-&gt;childNodes-&gt;length &amp;&amp; $script-&gt;firstChild-&gt;nodeType == 4) {</code></pre>
	<p>
		$cdata = $script-&gt;removeChild($script-&gt;firstChild);.
	</p>
	<p>
		$text = $dom-&gt;createTextNode($cdata-&gt;nodeValue);.
	</p>
	<p>
		$script-&gt;appendChild($text);.
	</p>
	<p>
		}.
	</p>
	<h2>}</h2>
	<p>
		$y = $dom-&gt;save("x.html");.
	</p>
	<p>
		________________.
	</p>
	<p>
		Preg_replace('/\r\n/', "\n", ob_get_contents());.
	</p>
	<p>
		$x = eval(file_get_contents("Template.php"));.
	</p>
	<p>
		$list = $dom-&gt;getElementsByTagName('script');.
	</p>
	<h2>foreach ($list as $script) {</h2>
	<pre class='indent-c'><code class='block'>if ($script-&gt;childNodes-&gt;length &amp;&amp; $script-&gt;firstChild-&gt;nodeType == 4) {</code></pre>
	<p>
		$cdata = $script-&gt;removeChild($script-&gt;firstChild);.
	</p>
	<p>
		$text = $dom-&gt;createTextNode($cdata-&gt;nodeValue);.
	</p>
	<p>
		$script-&gt;appendChild($text);.
	</p>
	<p>
		}.
	</p>
	<h2>}</h2>
	<p>
		$y = $dom-&gt;save("x.html");.
	</p>
	<pre class='indent-c'><code class='block'>$y = str_replace("&lt;![CDATA[", "//&lt;![CDATA[", $y);</code></pre>
	<p>
		________________.
	</p>
	<p>
		Uses HTML version of the API - loadHTML &amp; saveHTMl.
	</p>
	<p>
		Fn:DOMDocument:save is the XML version.
	</p>
	<p>
		________________.
	</p>
	<p>
		Type hinting is allowed for only object and array data types and is not available for scalar data types such as string, integer.
	</p>
	<p>
		________________.
	</p>
	<h2>Null Check - String</h2>
	<p>
		If (strlen($str) == 0).
	</p>
	<h2>function IsNullOrEmptyString($question){</h2>
	<pre class='indent-c'><code class='block'>return (!isset($question) || trim($question)==='');</code></pre>
	<p>
		}.
	</p>
	<p>
		How is it different to is_null()?
	</p>
	<p>
		Isset().
	</p>
	<p>
		________________.
	</p>
	<h2>Save to file</h2>
	<p>
		File_put_contents(“”, $x);.
	</p>
	<p>
		________________.
	</p>
	<h2>Exit</h2>
	<p>
		Exit (String|Int);.
	</p>
	<p>
		<strong>Alias.</strong> Die.
	</p>
	<h2>Strings</h2>
	<h2>SubString</h2>
	<p>
		SubStr(String, Start +,- , [length]|remaining till end).
	</p>
	<h2>Length</h2>
	<p>
		StrLen(String).
	</p>
	<p>
		Date Time.
	</p>
	<p>
		Date_default_timezone_set(".
	</p>
	<h2>Get URL Param Value</h2>
	<p>
		$_GET['Param1'];.
	</p>
	<h2>Array</h2>
	<h4>HashTable</h4>
	<p>
		$a=array("a"=&gt;"Dog","b"=&gt;"Cat");.
	</p>
	<h2>Check Key</h2>
	<p>
		If (array_key_exists("c",$a)).
	</p>
	<p>
		________________.
	</p>
	<h2>Check string equality</h2>
	<p>
		If ($x == “X”).
	</p>
	<h2>Comment</h2>
	<p>
		Has to be in a PHP block.
	</p>
	<p>
		/*.
	</p>
	<h2>Log</h2>
	<pre class='indent-c'><code class='block'>Log error_log(&lt;message&gt;)</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
