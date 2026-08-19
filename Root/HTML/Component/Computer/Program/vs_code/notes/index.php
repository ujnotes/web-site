<div id='message'>
	<p>
		Add keyboard binding.
	</p>
	<h2>1. Edit the keyboard setting json file</h2>
	<ol class="list-number content-list">
		<li><div>Not the default one.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>The preference one.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>Place in square brackets - proper json.</div></li>
	</ol>
	<p>
		<strong>4. Command palette.</strong> Edit keyboard json : preferences one.
	</p>
	<p>
		Add underscore delete.
	</p>
	<pre class='indent-c'><code class='block'>{ "key": "ctrl+alt+backspace", "command": "deleteWordPartLeft", "when": "textInputFocus &amp;&amp; !editorReadonly" }</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
