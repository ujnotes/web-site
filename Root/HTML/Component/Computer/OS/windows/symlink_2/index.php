<div id='message'>
	<h2>Relative path</h2>
	<p>
		Relative symlinks' relativity is to their current location. This is to be considered in the creation command param.
	</p>
	<p>
		Relative symlinks within a symlinked folder work only as long as their relation is contained within the parent symlinked folder. Relativity is as per the current location based on the symlinked parent.
	</p>
	<h2>Directory</h2>
	<h4>J</h4>
	<p>
		Junctions are followed even on the network.
	</p>
	<h4>D</h4>
	<p>
		Not followed when on the network.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
