<div id='message'>
		<p>
		macOS notes: shell, PATH, disks, Finder hidden files, SSH keys, and Yosemite USB install media.
	</p>
	<h2>Topics</h2>
	<h4>Disk usage</h4>
	<p>
		Directory-wise size, human readable.
	</p>
	<h4>Export</h4>
	<p>
		<code class='inline'>export</code> puts a variable into the environment. Append a directory to <code class='inline'>PATH</code>
	</p>
	<h4>Find</h4>
	<p>
		<code class='inline'>find</code> walks a path and matches names.
	</p>
	<h4>Hidden files</h4>
	<p>
		From Terminal, show or hide hidden files in Finder, then restart Finder.
	</p>
	<h4>Netcat</h4>
	<p>
		<code class='inline'>nc</code> is netcat. Listen on localhost.
	</p>
	<h4>Open</h4>
	<p>
		<code class='inline'>/usr/bin/open</code> opens files and applications.
	</p>
	<h4>osascript</h4>
	<p>
		<code class='inline'>$1</code> is the color, as a four-value tuple.
	</p>
	<h4>Paste newline unicode</h4>
	<p>
		Pasted text can carry a Unicode newline (<code class='inline'>\xe2\x80\xa8</code>) instead of a real newline. Replace those bytes in <code class='inline'>permission.txt</code>. <code class='inline'>-i.old</code> writes in place and keeps a <code class='inline'>permission.txt.old</code> backup.
	</p>
	<h4>PATH</h4>
	<p>
		Set <code class='inline'>PATH</code> in <code class='inline'>~/.bash_profile</code>. Prepend an optional extra path.
	</p>
	<h4>Setup USB installation media</h4>
	<p>
		Build bootable OS X Yosemite USB install media.
	</p>
	<h4>SSH</h4>
	<p>
		From <code class='inline'>~/.ssh</code>, write the public key from the private key.
	</p>

</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>