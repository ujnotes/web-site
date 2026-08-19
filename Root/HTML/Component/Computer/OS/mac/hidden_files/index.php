<div id='message'>
	<p>
		From Terminal, show or hide hidden files in Finder, then restart Finder.
	</p>
	<h2>Show</h2>
	<pre class='indent-c'><code class='block'>defaults write com.apple.finder AppleShowAllFiles -boolean true ; killall Finder</code></pre>
	<h2>Hide</h2>
	<pre class='indent-c'><code class='block'>defaults write com.apple.finder AppleShowAllFiles -boolean false ; killall Finder</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
