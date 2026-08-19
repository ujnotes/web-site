<div id='message'>
	<p>
		<code class='inline'>hostname</code> displays the current hostname.
	</p>
	<pre class='indent-c'><code class='block'>hostname</code></pre>
	<p>
		<code class='inline'>-f</code> displays the FQDN.
	</p>
	<pre class='indent-c'><code class='block'>hostname -f</code></pre>
	<h2>Set hostname</h2>
	<pre class='indent-c'><code class='block'>hostname &lt;name&gt;</code></pre>
	<p>
		This is not saved in <code class='inline'>/etc/hostname</code>.
	</p>
	<p>
		To persist:
	</p>
	<p>
		Caution: this replaces <code class='inline'>/etc/hostname</code> and edits <code class='inline'>/etc/hosts</code>.
	</p>
	<pre class='indent-c'><code class='block'>echo &lt;hostname&gt; &gt; /etc/hostname
hostname -F /etc/hostname</code></pre>
	<p>
		Edit <code class='inline'>/etc/hosts</code>:
	</p>
	<pre class='indent-c'><code class='block'>vi /etc/hosts</code></pre>
	<p>
		Append:
	</p>
	<pre class='indent-c'><code class='block'>&lt;Global IP&gt; [FQDN] &lt;hostname&gt;</code></pre>
	<h2>Verify</h2>
	<pre class='indent-c'><code class='block'>hostname
hostname -f</code></pre>
	<p>
		<code class='inline'>hostname</code> should show only the hostname. <code class='inline'>hostname -f</code> should show the FQDN.
	</p>
	<h2>SSH name</h2>
	<p>
		For updating the SSH name, delete the <code class='inline'>known_hosts</code> entry.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
