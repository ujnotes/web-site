<div id='message'>
	<p>
		Default lock screen image:
	</p>
	<pre class='indent-c'><code class='block'>%WinDir%\Web\Screen</code></pre>
	<p>
		File: <code class='inline'>img100.jpg</code>.
	</p>
	<h2>SystemData</h2>
	<pre class='indent-c'><code class='block'>%ProgramData%\Microsoft\Winodws\SystemData</code></pre>
	<p>
		Get rights. <code class='inline'>S-1-5-18</code> &gt; ReadOnly &gt; <code class='inline'>LockScreen_Z</code>. File: <code class='inline'>LockScreen___1920_1080</code>.
	</p>
	<p>
		Caution: changing rights on <code class='inline'>SystemData</code> needs administrative access.
	</p>
	<h2>WinSxS</h2>
	<pre class='indent-c'><code class='block'>%WinDir%\WinSxS</code></pre>
	<p>
		Search: <code class='inline'>img100.jpg</code>.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
