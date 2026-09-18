<div id='message'>
	<h2>Join two lists</h2>
	<pre class='indent-c'><code class='block'>1. List&lt;String&gt; newList = new ArrayList&lt;String&gt;(listOne);</code></pre>
	<p>
		NewList.addAll(listTwo);.
	</p>
	<h2>2. ListUtils.union(list1,list2);</h2>
	<p>
		Requires apache commons.
	</p>
	<h2>Get class’s details</h2>
	<pre class='indent-c'><code class='block'>Get class’s details JavaP -verbose &lt;class-file&gt;</code></pre>
	<p>
		________________.
	</p>
	<h2>ArrayList : capacity &amp; size</h2>
	<p>
		Initial size is capacity.
	</p>
	<h4>that does not equate to size</h4>
	<p>
		Actual elements need to be added for size to grow.
	</p>
	<p>
		Same with Array[].
	</p>
	<p>
		Java is a computer programming language.
	</p>
	<p>
		Developed by James Gosling in 1982.
	</p>
	<p>
		Not purely Object oriented as it supports primitive data types like boolean, byte, int etc.
	</p>
	<p>
		(this terminology is however subjective).
	</p>
	<p>
		Both interpreted and compiled.
	</p>
	<p>
		Machine independent code - as the source code is compiled into bytecode which is then interpreted during runtime.
	</p>
	<p>
		JRE - Java runtime environment specific to the machine is required to run the code.
	</p>
	<p>
		JIT - just in time compiler, an optional component that again compiles bytecode into machine code. It optimizes procedure calls that are prioritized. JVM can reuse optimized code instead of interpreting again.
	</p>
	<p>
		Stack memory holds variables and procedures whereas the heap holds the dynamic objects.
	</p>
	<p>
		Pointers are Not supported in Java, it uses it internally. Only references are supported.
	</p>
	<p>
		References are initialized to null.
	</p>
	<p>
		Numeric variables are initialized to zero and likewise, boolean to false.
	</p>
	<p>
		Variables are otherwise not initialized by default and usage will result in “variable might not be initialized” during compile time.
	</p>
	<p>
		Difference between C++ &amp; Java.
	</p>
	<ul class="list-bullet content-list">
		<li><div>Compiled v/s interpreted.</div></li>
	</ul>
	<ul class="list-bullet content-list">
		<li><div>Machine independent.</div></li>
	</ul>
	<ul class="list-bullet content-list">
		<li><div>Pointers.</div></li>
	</ul>
	<ul class="list-bullet content-list">
		<li><div>Multiple inheritance.</div></li>
	</ul>
	<h2>== operator checks if both sides reference same object</h2>
	<p>
		Cannot be overridden.
	</p>
	<p>
		Compares hashcode.
	</p>
	<h2>.equals</h2>
	<p>
		Checks if the attributes are equal individually.
	</p>
	<p>
		Can be overridden.
	</p>
	<p>
		Usually has to as per the required business logic.
	</p>
	<h2>Copy constructor</h2>
	<p>
		Constructor with class as parameter.
	</p>
	<p>
		Sets values separately.
	</p>
	<h2>Single try block - multiple catch</h2>
	<p>
		As per type of exception thrown.
	</p>
	<h2>Finally</h2>
	<p>
		Last block of code to be executed after exception has been handled.
	</p>
	<p>
		May not execute as the try block can crash - by stack overflow or terminate by system.exit().
	</p>
	<h2>Final variable</h2>
	<p>
		Once assigned - cannot be changed.
	</p>
	<p>
		If not initialized - can only be set by the constructor.
	</p>
	<h2>Final class</h2>
	<p>
		Cannot be inherited.
	</p>
	<h2>Super</h2>
	<p>
		Used to access parent’s variables and methods.
	</p>
	<p>
		Super.method_1();.
	</p>
	<p>
		Super.var_1;.
	</p>
	<h2>Static</h2>
	<p>
		Belong to the class not to the object, hence single copy.
	</p>
	<p>
		Can be overloaded - differing in params.
	</p>
	<h2>Class</h2>
	<p>
		Only inner (member) class can be static.
	</p>
	<p>
		A static nested class can be instantiated without instantiating its outer class.
	</p>
	<p>
		Inner class can access both static and non-static members of its outer class.
	</p>
	<p>
		Static inner class can access only static members of its outer class.
	</p>
	<h2>OuterClass.InnerClass inner = outer.new InnerClass();</h2>
	<p>
		OuterClass.InnerClass innerObject = new OuterClass().new InnerClass();.
	</p>
	<p>
		Garbage collector frees memory from the heap.
	</p>
	<p>
		System.gc();.
	</p>
	<p>
		ClassLoader load class belongs to JRE.
	</p>
	<p>
		Shallow copy - only creates a new reference.
	</p>
	<p>
		Deep copy - actually creates a separate copy, properties are set separately.
	</p>
	<p>
		–.
	</p>
	<p>
		Strings are immutable, i.e. cannot be altered.
	</p>
	<p>
		Optimization for String pool in heap.
	</p>
	<p>
		<strong>Multithreading.</strong> Simple code as no synchronization is required. Required for concurrency.
	</p>
	<p>
		<strong>Collections.</strong> Hashtables and hashmaps have String keys requiring that they must not change.
	</p>
	<h2>Singleton class</h2>
	<p>
		Private constructor.
	</p>
	<h4>Initialized through a static function</h4>
	<p>
		That checks if an object exists.
	</p>
	<p>
		Else creates and returns reference to it.
	</p>
	<p>
		Singletons written with double-checked locking can be thread-safe.
	</p>
	<p>
		https://www.baeldung.com/java-singleton-double-checked-locking
	</p>
	<p>
		<strong>Best way.</strong> Java enums.
	</p>
	<h2>Array initialization</h2>
	<pre class='indent-c'><code class='block'>&lt;type&gt; &lt;var&gt;[&lt;n&gt;]</code></pre>
	<p>
		N should be a valid integer - for successful compilation.
	</p>
	<pre class='indent-c'><code class='block'>-ve is thus allowed</code></pre>
	<p>
		N should be a valid positive integer - for successful run.
	</p>
	<h2>Abstract class</h2>
	<pre class='indent-c'><code class='block'>Abstract class Syntax: class abstract &lt;class_name&gt;</code></pre>
	<p>
		Cannot be instantiated, only subclassed (i.e. inherited).
	</p>
	<p>
		As such “incomplete class”.
	</p>
	<p>
		Can have both abstract and not abstract members.
	</p>
	<h2>Interface</h2>
	<p>
		Blueprint of a class.
	</p>
	<p>
		Cannot contain any instances.
	</p>
	<p>
		Can only have public members.
	</p>
	<p>
		Methods cannot have any definition.
	</p>
	<p>
		More ‘abstract’.
	</p>
	<pre class='indent-c'><code class='block'>Syntax: interface &lt;class_name&gt;</code></pre>
	<h2>Comparator</h2>
	<p>
		Custom comparison method implemented via interface.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
