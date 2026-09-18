<div id='message'>
	<pre class='indent-c'><code class='block'>&lt;?xml version="1.0" encoding="UTF-8" ?&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;?xml &lt;!DOCTYPE log4j:configuration SYSTEM "log4j.dtd"&gt;</code></pre>
	<h2>&lt;log4j:configuration debug="true"</h2>
	<p>
		Xmlns:log4j='http://jakarta.apache.org/log4j/'&gt;.
	</p>
	<pre class='indent-c'><code class='block'>&lt;appender name="file" class="org.apache.log4j.RollingFileAppender"&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;param name="append" value="false" /&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;param &lt;param name="maxFileSize" value="10KB" /&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;param &lt;param name="maxBackupIndex" value="5" /&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;param &lt;!-- For Tomcat --&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;!-- &lt;param name="file" value="${catalina.home}/logs/&lt;App&gt;.log" /&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;param &lt;layout class="org.apache.log4j.PatternLayout"&gt;</code></pre>
	<p>
		&lt;param name="ConversionPattern".
	</p>
	<p>
		Value="%d{yyyy-MM-dd HH:mm:ss} %-5p %c{1}:%L - %m%n" /&gt;.
	</p>
	<pre class='indent-c'><code class='block'>&lt;layout &lt;/layout&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;appender &lt;/appender&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;root&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;level value="ERROR" /&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;level &lt;appender-ref ref="file" /&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;root&gt; &lt;/root&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;/log4j:configuration&gt;</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
