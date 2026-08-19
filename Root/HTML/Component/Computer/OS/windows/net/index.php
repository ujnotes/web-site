<div id='message'>
	<p>
		Caution: creating accounts and changing group membership needs admin rights.
	</p>
	<h2>Create user account</h2>
	<pre class='indent-c'><code class='block'>NET USER &lt;username&gt; &lt;password&gt; /ADD</code></pre>
	<h2>Add user to a local group</h2>
	<pre class='indent-c'><code class='block'>NET LOCALGROUP &lt;group&gt; &lt;user&gt; /add</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
