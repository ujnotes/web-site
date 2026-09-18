<div id='message'>
	<p>
		Configuration: private static List&lt;String&gt; listIp = Arrays.asList, private static List&lt;String&gt; listNoSecURI = Arrays., and private private static List&lt;String&gt; listNoSecDir =.
	</p>
	<pre class='indent-c'><code class='block'>private static List&lt;String&gt; listIp = Arrays.asList(ResourceBundle.getBundle("config").getString("SelfIP").split(","));</code></pre>
	<pre class='indent-c'><code class='block'>private static List&lt;String&gt; listNoSecURI = Arrays.asList(ResourceBundle.getBundle("config").getString("NoSecURI").split(","));</code></pre>
	<pre class='indent-c'><code class='block'>private private static List&lt;String&gt; listNoSecDir = Arrays.asList(ResourceBundle.getBundle("config").getString("NoSecDir").split(","));</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
