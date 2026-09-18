<div id='message'>
	<p>
		Windows - docker desktop.
	</p>
	<ol class="list-number content-list">
		<li><div>Dockerfile has the final commands.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>Docker-compose.yaml file is for building container.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>Each command can be a layer.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>/bin/bash for improved shell.</div></li>
	</ol>
	<h2>5. Remember - the mount directory from the compose file is completely replaced - hence any operation by the build is simply overwritten and lost</h2>
	<ol class="list-number content-list">
		<li><div>So instead of say downloading a file into the mounted /app dir download to /usr/local/lib.</div></li>
	</ol>
	<p>
		2.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
