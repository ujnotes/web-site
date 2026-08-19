<div id='message'>
	<p>
		Notes: keytool -importkeystore -deststorepass &lt;PASS&gt; -des, and keytool -import -trustcacerts -alias root -file &lt;c.
	</p>
	<pre class='indent-c'><code class='block'>keytool -importkeystore -deststorepass &lt;PASS&gt; -destkeypass &lt;PASS&gt; -destkeystore &lt;MyDSKeyStore.jks&gt; -srckeystore &lt;fullchain_and_key.p12&gt; -srcstoretype pkcs12 -srcstorepass &lt;PASS&gt; -alias tomcat</code></pre>
	<pre class='indent-c'><code class='block'>keytool -import -trustcacerts -alias root -file &lt;chain.pem&gt; -keystore &lt;MyDSKeyStore.jks&gt;</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
