<div id='message'>
	<p>
		Assisted by google workspace - help me write.
	</p>
	<p>
		To use multiple git accounts, you can use the .ssh/config file. This file stores your SSH configuration information, including your username, hostname, and port number for each account. You can then use this information to connect to your git repositories without having to enter your username and password each time.
	</p>
	<h2>To create a .ssh/config file, open a text editor and create a new file called .ssh/config in your home directory. Add the following lines to the file</h2>
	<p>
		Host my-first-account.
	</p>
	<p>
		Hostname github.com.
	</p>
	<p>
		User johndoe.
	</p>
	<p>
		Port 22.
	</p>
	<p>
		Host my-second-account.
	</p>
	<p>
		Hostname bitbucket.org.
	</p>
	<p>
		User janedoe.
	</p>
	<p>
		Port 22.
	</p>
	<h2>Save the file and close the text editor. Then, open a terminal and run the following command</h2>
	<pre class='indent-c'><code class='block'>ssh -t my-first-account</code></pre>
	<p>
		This will connect you to your first git account. You can then use the git command-line tools to interact with your repository.
	</p>
	<h2>To connect to your second git account, run the following command</h2>
	<pre class='indent-c'><code class='block'>ssh -t my-second-account</code></pre>
	<p>
		You can also use the .ssh/config file to store other information, such as your SSH key fingerprint and the path to your private key. For more information, see the ssh_config man page.
	</p>
	<p>
		In VScode.
	</p>
	<p>
		<strong>if you get error.</strong> Git@github.com: Permission denied (publickey).
	</p>
	<pre class='indent-c'><code class='block'>Get-Service -Name ssh-agent | Set-Service -StartupType Manual</code></pre>
	<pre class='indent-c'><code class='block'>ssh-agent</code></pre>
	<pre class='indent-c'><code class='block'>ssh-add</code></pre>
	<pre class='indent-c'><code class='block'>git config --global core.sshCommand C:/Windows/System32/OpenSSH/ssh.exe</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
