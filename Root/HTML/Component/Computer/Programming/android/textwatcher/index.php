<div id='message'>
	<p>
		BeforeTextChanged.
	</p>
	<h2>CharSequence s,</h2>
	<p>
		Int start,.
	</p>
	<p>
		Int count,.
	</p>
	<p>
		Int after).
	</p>
	<p>
		<strong>info.</strong> Within s, the count characters beginning at start are about to be replaced by new text with length ‘after’.
	</p>
	<p>
		*<strong> if addition.</strong> Count = 0.
	</p>
	<h2>* ‘after’ is length of delta text</h2>
	<p>
		<strong>Action.</strong> Do not change s : error.
	</p>
	<h2>onTextChanged</h2>
	<p>
		CharSequence s,.
	</p>
	<p>
		Int start.
	</p>
	<p>
		Int before.
	</p>
	<p>
		Int count.
	</p>
	<p>
		<strong>Info.</strong> Replacement has commenced.
	</p>
	<h2>Within ‘s’, beginning from ‘start’, ‘count’ characters have changed that had length ‘before’</h2>
	<p>
		<strong>Action.</strong> Do not change s : error.
	</p>
	<h2>afterTextChanged</h2>
	<p>
		Editable s.
	</p>
	<p>
		<strong>Info.</strong> Text changed.
	</p>
	<p>
		<strong>Action.</strong> Ok to edit.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
