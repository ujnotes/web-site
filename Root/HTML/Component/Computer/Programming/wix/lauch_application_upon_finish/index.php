<div id='message'>
	<pre class='indent-c'><code class='block'>1. -ext WixUIExtension -ext WixUtilExtension</code></pre>
	<pre class='indent-c'><code class='block'>2. &lt;Property Id="WIXUI_EXITDIALOGOPTIONALCHECKBOXTEXT" Value="Launch My Application Name" /&gt; in &lt;Product&gt;</code></pre>
	<pre class='indent-c'><code class='block'>3. &lt;Property Id="WixShellExecTarget" Value="[#myapplication.exe]" /&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;CustomAction Id="LaunchApplication" BinaryKey="WixCA" DllEntry="WixShellExec" Impersonate="yes" /&gt;</code></pre>
	<h2>4. &lt;Publish Dialog="ExitDialog"</h2>
	<pre class='indent-c'><code class='block'>4. &lt;Publish Dialog="ExitDialog" Value="LaunchApplication"&gt;WIXUI_EXITDIALOGOPTIONALCHECKBOX = 1 and NOT Installed&lt;/Publish&gt;</code></pre>
	<p>
		Control="Finish".
	</p>
	<p>
		Event="DoAction".
	</p>
	<pre class='indent-c'><code class='block'>4. &lt;Publish Dialog="ExitDialog" in &lt;UI&gt; after &lt;UIRef Id="WixUI_&lt;&gt;" /&gt;</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
