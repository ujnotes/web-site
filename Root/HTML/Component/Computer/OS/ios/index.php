<div id='message'>
		<p>
		iOS notes: show or hide Finder hidden files with defaults write and killall Finder, including the OS X 10.8 form.
	</p>
	<p>
		Show or hide hidden files in Finder, then restart Finder.
	</p>
	<h2>Show hidden files</h2>
	<pre class='indent-c'><code class='block'>defaults write com.apple.finder AppleShowAllFiles -boolean true ; killall Finder</code></pre>
	<h2>Hide hidden files</h2>
	<pre class='indent-c'><code class='block'>defaults write com.apple.finder AppleShowAllFiles -boolean false ; killall Finder</code></pre>
	<h2>OS X 10.8 and prior</h2>
	<p>
		Show:
	</p>
	<pre class='indent-c'><code class='block'>defaults write com.apple.finder AppleShowAllFiles TRUE ; killall Finder</code></pre>
	<p>
		Hide:
	</p>
	<pre class='indent-c'><code class='block'>defaults write com.apple.finder AppleShowAllFiles FALSE ; killall Finder</code></pre>

</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>