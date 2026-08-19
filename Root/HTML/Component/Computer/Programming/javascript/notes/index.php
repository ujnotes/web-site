<div id='message'>
	<p>
		Detect Null.
	</p>
	<h2>if(!!var)</h2>
	<p>
		Not Null.
	</p>
	<p>
		Ie. also Not 0 (not effective for undefined).
	</p>
	<h2>undefined</h2>
	<p>
		=== undefined.
	</p>
	<h2>Null</h2>
	<p>
		===null.
	</p>
	<p>
		________________.
	</p>
	<p>
		Detect Undefined Object (Prevent Exception).
	</p>
	<h2>if (typeof something === "undefined")</h2>
	<p>
		Alert("something is undefined");.
	</p>
	<p>
		________________.
	</p>
	<h2>Delete Node</h2>
	<h4>Parent</h4>
	<p>
		E.parentNode.removeChild(e);.
	</p>
	<p>
		________________.
	</p>
	<pre class='indent-c'><code class='block'>&lt;script type="text/javascript"&gt;presentation()&lt;/script&gt;</code></pre>
	<p>
		Script content with src attribute is not executed.
	</p>
	<p>
		Script updated by innerHtml is not executed.
	</p>
	<p>
		________________.
	</p>
	<h2>Detect</h2>
	<p>
		http://diveintohtml5.info/everything.html
	</p>
	<p>
		<strong>Library.</strong> Http://modernizr.com/.
	</p>
	<p>
		________________.
	</p>
	<p>
		Get Text after substring.
	</p>
	<p>
		Var s = "aijfoi aodsifj adofija afdoiajd?order_num=3216545";.
	</p>
	<p>
		Var m = s.match(/([^\?]*)\?order_num=(\d*)/);.
	</p>
	<p>
		Var num = m[2], rest = m[1];.
	</p>
	<p>
		________________.
	</p>
	<p>
		Document.getElementById('classRight').style.display = 'none';.
	</p>
	<p>
		<strong>Alternatively (not recommended).</strong> Document.getElementById("classRight").setAttribute("style","display:none;");.
	</p>
	<p>
		________________.
	</p>
	<p>
		The function is called as soon as it is declared.
	</p>
	<p>
		(.
	</p>
	<p>
		Function (...).
	</p>
	<p>
		{.
	</p>
	<p>
		….
	</p>
	<p>
		}.
	</p>
	<p>
		)(...);.
	</p>
	<p>
		________________.
	</p>
	<p>
		AddEventListner in Chrome.
	</p>
	<p>
		AttachEvent in IE9.
	</p>
	<p>
		________________.
	</p>
	<h2>onclick</h2>
	<p>
		Pass this as param (to not have to refer using id).
	</p>
	<p>
		________________.
	</p>
	<h2>Open url and mailto</h2>
	<pre class='indent-c'><code class='block'>url - self</code></pre>
	<pre class='indent-c'><code class='block'>mailto - blank</code></pre>
	<p>
		________________.
	</p>
	<h2>Break</h2>
	<p>
		Debugger;.
	</p>
	<h2>Log</h2>
	<pre class='indent-c'><code class='block'>Log Console.log(&lt;message&gt;);</code></pre>
	<p>
		________________.
	</p>
	<p>
		Cannot pass parameters to function pointer.
	</p>
	<p>
		________________.
	</p>
	<p>
		Variable ‘hoisting’.
	</p>
	<p>
		Variable initialized with.
	</p>
	<p>
		________________.
	</p>
	<p>
		In JavaScript, an undeclared variable is assigned the value undefined at execution and is also of type undefined.
	</p>
	<p>
		________________.
	</p>
	<p>
		All undeclared variables are global variables.
	</p>
	<p>
		Hoisting causes the variable declaration to implicitly occur at the top of current scope.
	</p>
	<p>
		Assignment though occurs at usual spot.
	</p>
	<p>
		‘use strict’ changes hoisting behaviour.
	</p>
	<p>
		Variables are no longer hoisted.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
