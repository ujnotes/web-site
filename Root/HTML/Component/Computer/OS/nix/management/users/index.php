<div id='message'>
	<h2>User</h2>
	<h4>Add</h4>
	<p>
		No-prompt:
	</p>
	<pre class='indent-c'><code class='block'>useradd
/usr/sbin/useradd &lt;name&gt;</code></pre>
	<p>
		Prompt: <code class='inline'>adduser</code> creates the requisite directories and provisions the rest.
	</p>
	<pre class='indent-c'><code class='block'>adduser</code></pre>
	<h4>Delete</h4>
	<p>
		Caution: these commands remove a user account.
	</p>
	<pre class='indent-c'><code class='block'>userdel</code></pre>
	<pre class='indent-c'><code class='block'>deluser --remove-home</code></pre>
	<h4>No login</h4>
	<p>
		No-login account: <code class='inline'>_</code>.
	</p>
	<h4>Password</h4>
	<pre class='indent-c'><code class='block'>passwd [user]</code></pre>
	<h4>Filesystem rights</h4>
	<pre class='indent-c'><code class='block'>setfacl -R -m user:&lt;user&gt;:rwx &lt;path&gt;</code></pre>
	<h2>Group</h2>
	<p>
		There is no group of groups. Only users in a group.
	</p>
	<h4>Add</h4>
	<pre class='indent-c'><code class='block'>groupadd &lt;group&gt;</code></pre>
	<h4>Remove</h4>
	<pre class='indent-c'><code class='block'>groupdel &lt;group&gt;</code></pre>
	<h4>Filesystem rights</h4>
	<pre class='indent-c'><code class='block'>chgrp -R &lt;group&gt; &lt;path&gt;</code></pre>
	<h4>Show</h4>
	<p>
		Groups are listed in <code class='inline'>/etc/group</code>.
	</p>
	<pre class='indent-c'><code class='block'>cut -d: -f1 /etc/group</code></pre>
	<h2>User and group</h2>
	<h4>Add to group</h4>
	<pre class='indent-c'><code class='block'>usermod -a -g &lt;group&gt; &lt;User&gt;</code></pre>
	<p>
		<code class='inline'>-a</code> appends, with removing from other groups.
	</p>
	<h2>Sudo group</h2>
	<p>
		A user can be added to a group, but a file under <code class='inline'>/etc/sudoers.d</code> is better for upgrades. Preferred:
	</p>
	<pre class='indent-c'><code class='block'>&lt;user&gt; ALL=(ALL:ALL) ALL</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
