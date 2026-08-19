<div id='message'>
	<h2>Install nodejs/npm</h2>
	<p>
		Sudo apt-get update.
	</p>
	<pre class='indent-c'><code class='block'>sudo apt-get install -y python-software-properties python g++ make</code></pre>
	<p>
		Sudo add-apt-repository ppa:chris-lea/node.js.
	</p>
	<p>
		Sudo apt-get update.
	</p>
	<p>
		Sudo apt-get install nodejs.
	</p>
	<p>
		Npm config set prefix ~/npm.
	</p>
	<p>
		And adding $HOME/npm/bin to $PATH.
	</p>
	<p>
		Append to .bashrc.
	</p>
	<p>
		Exports PATH="$PATH:$HOME/npm/bin".
	</p>
	<h2>Install grunt-cli</h2>
	<pre class='indent-c'><code class='block'>npm install -g grunt-cli</code></pre>
	<h2>Install Appium</h2>
	<pre class='indent-c'><code class='block'>npm install -g appium</code></pre>
	<h2>Set up a symlink in your .bashrc file for Appium</h2>
	<pre class='indent-c'><code class='block'>ln -s /path/to/appium.js /usr/bin/appium</code></pre>
	<p>
		Appium.
	</p>
	<h2>If required</h2>
	<p>
		Either place a_.json file or.
	</p>
	<p>
		Run reset.sh (https://github.com/appium/appium/blob/master/reset.sh).
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
