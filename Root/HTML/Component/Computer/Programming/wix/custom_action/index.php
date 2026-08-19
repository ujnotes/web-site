<div id='message'>
	<p>
		&lt;CustomAction Id='StopOrcService' BinaryKey='StopOrcService' DllEntry='StopOrcService' Execute='immediate' Return='check'/&gt;.
	</p>
	<pre class='indent-c'><code class='block'>&lt;CustomAction Id='StopOrcService' BinaryKey='StopOrcService' DllEntry='StopOrcService' Execute='immediate' Return='check'/&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;InstallExecuteSequence&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;Custom Action='StopOrcService' After='ProcessComponents' /&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;InstallExecuteSequence&gt; &lt;/InstallExecuteSequence&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;Binary Id='StopOrcService' SourceFile='SetupDLL.dll' /&gt;</code></pre>
	<p>
		________________.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
