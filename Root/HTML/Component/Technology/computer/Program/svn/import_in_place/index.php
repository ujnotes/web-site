<div id='message'>
	<p>
		Create a new project folder directly in the repository.
	</p>
	<p>
		If you are using one of the standard layouts you will probably want to create this as a sub-folder of trunk rather than in the repository root.how things are organised.
	</p>
	<p>
		Checkout the SVN folder over the top of the folder you want to import.
	</p>
	<p>
		You will get a warning that the local folder is not empty. Ignore the warning.
	</p>
	<p>
		Now you have a versioned top level folder with unversioned content.
	</p>
	<p>
		Use TortoiseSVN ? Add... on this versioned folder to add some or all of the content.
	</p>
	<p>
		You can add and remove files, set svn:ignore properties on folders and make any other changes you need to.
	</p>
	<p>
		Commit the top level folder, and you have a new versioned tree, and a local working copy, created from your existing folder.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
