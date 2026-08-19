<div id='message'>
	<p>
		See [take ownership of a file, folder, drive, or registry key](http://www.eightforums.com/tutorials/2808-take-ownership-file-folder-drive-registry-key-windows-8-a.html).
	</p>
	<p>
		<code class='inline'>CACLS</code> is deprecated in favour of <code class='inline'>ICACLS</code>. <code class='inline'>ICACLS</code> does not set or read the owner.
	</p>
	<h2>Grant</h2>
	<pre class='indent-c'><code class='block'>icacls &lt;Directory|File&gt; /grant Administrators:F</code></pre>
	<p>
		<code class='inline'>/T</code> applies the grant to all matching files and subdirectories.
	</p>
	<p>
		Caution: <code class='inline'>icacls /grant</code> changes NTFS permissions and typically needs elevation.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
