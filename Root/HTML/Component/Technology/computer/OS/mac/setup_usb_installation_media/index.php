<div id='message'>
	<p>
		Build bootable OS X Yosemite USB install media.
	</p>
	<p>
		Ref: https://support.apple.com/en-us/HT201372
	</p>
	<h2>Format USB media</h2>
	<p>
		In Disk Utility, Erase the stick:
	</p>
	<ul class="list-bullet content-list">
		<li><div>Volume: Yosemite</div></li>
		<li><div>Format: Journaled</div></li>
	</ul>
	<h2>Install</h2>
	<p>
		Caution: <code class='inline'>createinstallmedia</code> erases <code class='inline'>/Volumes/&lt;Volume&gt;</code> and needs <code class='inline'>sudo</code>.
	</p>
	<pre class='indent-c'><code class='block'>sudo /Applications/Install\ OS\ X\ Yosemite.app/Contents/Resources/createinstallmedia --volume /Volumes/&lt;Volume&gt; --applicationpath /Applications/Install\ OS\ X\ Yosemite.app --nointeraction</code></pre>
	<p>
		<code class='inline'>--volume</code> is the target volume. <code class='inline'>--applicationpath</code> is the Install OS X Yosemite app. <code class='inline'>--nointeraction</code> runs with no interaction.
	</p>
	<p>
		The run looks like:
	</p>
	<pre class='indent-c'><code class='block'>Ready to start.
To continue we need to erase the disk at /Volumes/Yosemite/.
If you wish to continue type (Y) then press return: y
Erasing Disk: 0%... 10%... 20%... 30%...100%...
Copying installer files to disk...
Copy complete.
Making disk bootable...
Copying boot files...
Copy complete.
Done.</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
