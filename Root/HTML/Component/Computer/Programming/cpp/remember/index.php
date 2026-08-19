<div id='message'>
	<h2>Friend Classes</h2>
	<p>
		Elder Friend who is accessible by Younger friend.
	</p>
	<p>
		Elder Friend does not need to Include Younger Friend.
	</p>
	<p>
		Overloading does not work accross scopes and thus accross inheritance.
	</p>
	<p>
		Always check for bounds in statically allocated arrrays.
	</p>
	<p>
		Object passing is preferred by refrencing, since-.
	</p>
	<p>
		Pass by value will result in invoking destructor - this might be undesiered especially if contained are memory blocks.
	</p>
	<p>
		For(; ;).
	</p>
	<h2>{</h2>
	<h4>for(; ;)</h4>
	<h4>if(!f())</h4>
	<p>
		Break;.
	</p>
	<p>
		}.
	</p>
	<p>
		Next Statement.
	</p>
	<p>
		<strong>Anomaly.</strong> Without curly braces Next becomes continuation for the first 'for'.
	</p>
	<p>
		<strong>Reference.</strong> '&amp;' to be used only at declaration. since: every where else it will be the 'address' operator.
	</p>
	<p>
		Calling the Constructor Explicitly creates an object.
	</p>
	<p>
		Not doing any thing with this subsequently invokes the destructor.
	</p>
	<p>
		RUN Double quoted string is a single param passed on.
	</p>
	<p>
		Once C-Style Commented block cannot contain another.
	</p>
	<p>
		CreateWindow causes jump from present fn into the WM_CREATE message.
	</p>
	<p>
		If HTML is UNICODE so should be the CSS.
	</p>
	<h2>in structured storage first commit changes and then chane time stamps</h2>
	<p>
		Or else the changes will be automatically commited upon close and thus time stamps will be re-updated.
	</p>
	<p>
		__LINE__ can be used to get the error line for debugging.
	</p>
	<p>
		GetFileTitle() - is "Folder Options" "Show file extensions" dependent.
	</p>
	<p>
		Current Directory of application initalized with commandline param (esp. registry file assosciation) is the directory of the passed file.
	</p>
	<h2>if</h2>
	<p>
		If.
	</p>
	<p>
		Else.
	</p>
	<p>
		Else.
	</p>
	<p>
		And.
	</p>
	<h2>if</h2>
	<p>
		If.
	</p>
	<p>
		Else if.
	</p>
	<p>
		Else.
	</p>
	<p>
		Actually becomes.
	</p>
	<h2>if</h2>
	<p>
		If.
	</p>
	<p>
		Else if.
	</p>
	<p>
		Else.
	</p>
	<p>
		Thus else-if is considered a group.
	</p>
	<p>
		<strong>BUG.</strong> A float member of the class - when not initialized in the constructor - but initialized in the WM_CREATE - remains - (OR rather becomes) uninitialized in the WM_PAINT.
	</p>
	<p>
		<strong>CRUCIAL.</strong> UINT x, UINT y.
	</p>
	<pre class='indent-c'><code class='block'>x = -1</code></pre>
	<p>
		Y = +1.
	</p>
	<p>
		If((int)x &lt; y):false.
	</p>
	<p>
		If((int)x &lt; (int)y):true.
	</p>
	<p>
		<strong>CRUICAL.</strong> Parenthesizing blocks for "if" and "for"s may be necessary or atleast semicolon at the end may be required :: in case of "break" resolution;.
	</p>
	<p>
		C++/(&amp; maybe) C compiler automatically concatenates string literals put togather. Usefull when defining a sting which is to be part of an another.
	</p>
	<p>
		Unsigned int upr = i-1;.
	</p>
	<p>
		Upr gets bullshit.
	</p>
	<ul class="list-bullet content-list">
		<li><div>initialization can not include variables.</div></li>
	</ul>
	<pre class='indent-c'><code class='block'>no - some problem w/ uint substraction</code></pre>
	<p>
		Cin &gt;&gt; (x,y);.
	</p>
	<p>
		1 input assigned to y.
	</p>
	<pre class='indent-c'><code class='block'>cout &lt;&lt; (x,y,x);</code></pre>
	<p>
		1 output of x.
	</p>
	<p>
		Int &amp;d = 0x00000007;.
	</p>
	<p>
		D created at temp add and has vlu = 7.
	</p>
	<p>
		Return by refrence returns the add of the var to b modified.
	</p>
	<p>
		A file needs to be reopened once eof is reached.
	</p>
	<p>
		Dosent matter if param var names aren't same in declaration &amp; definition.
	</p>
	<p>
		Data &amp; procedures must be defined foremost.
	</p>
	<p>
		The keyword extern is optional for a function prototype.
	</p>
	<p>
		Unsigned int a = x,b = y;.
	</p>
	<pre class='indent-c'><code class='block'># include &lt;iostream.h&gt;</code></pre>
	<p>
		Void main().
	</p>
	<h2>{</h2>
	<p>
		Unsigned int i = 1;.
	</p>
	<h4>do</h4>
	<pre class='indent-c'><code class='block'>cout &lt;&lt; i</code></pre>
	<p>
		&lt;&lt; '\t';.
	</p>
	<p>
		While(i--);.
	</p>
	<p>
		}.
	</p>
	<p>
		1 0.
	</p>
	<h2>This SUCKS! - in bncmrk.cpp</h2>
	<p>
		Unsigned int *x = new unsigned int(10000);.
	</p>
	<p>
		Unsigned int y[10000];.
	</p>
	<p>
		Unsigned int *y = new unsigned int(1000);.
	</p>
	<p>
		Appreciate.
	</p>
	<h2>function name being passed as an argument</h2>
	<h4>void qsort(void *base, size_t nelem, size_t width, int (_USERENTRY *fcmp)(const void *, const void *));</h4>
	<p>
		, must be used with the _USERENTRY calling convention.
	</p>
	<p>
		Qsort((void *)list, 5, sizeof(list[0]), function_name);.
	</p>
	<p>
		The return type of function_name is determined by the prototype of mother function.
	</p>
	<h2>how to build an aperable program on a program file(.cpp) e.g. a performance profiler</h2>
	<pre class='indent-c'><code class='block'>(profiler &lt; code) modification in and arround code -&gt; new final code</code></pre>
	<p>
		Class dt1.
	</p>
	<h2>{</h2>
	<p>
		Unsigned int dat;.
	</p>
	<h4>public</h4>
	<p>
		Dt1&amp; operator = (unsigned int);.
	</p>
	<p>
		};.
	</p>
	<p>
		Dt1&amp; dt1::operator = (unsigned int a).
	</p>
	<h2>{</h2>
	<p>
		Dat = a;.
	</p>
	<p>
		Return(*this);.
	</p>
	<p>
		};.
	</p>
	<p>
		Inorder to make a profiler of programs it must be able to provide exactly the same enviroment to every program.
	</p>
	<p>
		How to instantiate and thus modify features of basic elements like int or void*.
	</p>
	<p>
		Avoid static data members in programs calling themselves repeatedly - it really slows the program.
	</p>
	<p>
		Unsigned int[x] - x must already be a "constant".
	</p>
	<p>
		When performing arithmetic with pointers, it is assumed that the pointer points to an array of objects. Thus, if a pointer is declared to point to type, adding an integral value to the pointer advances the pointer by that number of objects of type. If type has size 10 bytes, then adding an integer 5 to a pointer to type advances the pointer 50 bytes in memory.
	</p>
	<p>
		_USERENTRY tells the compiler about the passed function.
	</p>
	<p>
		#if directives can be nested, but matching #else and #endif directives must.
	</p>
	<p>
		Be in the same file as the #if.
	</p>
	<h2>Appreciate</h2>
	<p>
		New &amp; delete operators can be overloaded.
	</p>
	<pre class='indent-c'><code class='block'>&lt;XY&lt;z&gt; &gt; : the space( ) is mandatory</code></pre>
	<h2>A label is just a name which marks a certain spot in the</h2>
	<p>
		Assembler code.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
