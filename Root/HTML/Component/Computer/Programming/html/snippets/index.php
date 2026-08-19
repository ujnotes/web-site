<div id='message'>
	<p>
		Disable ‘Select’.
	</p>
	<h2>.disabled{</h2>
	<p>
		<strong>color.</strong> Grey;.
	</p>
	<p>
		}.
	</p>
	<h2>if class present use prevent default on focus and on click, and dbl click</h2>
	<pre class='indent-c'><code class='block'>$('#el').bind('click dblclick focus').function(event){</code></pre>
	<pre class='indent-c'><code class='block'>if ($(this).hasClass('disabled')) event.preventDefault();</code></pre>
	<p>
		});.
	</p>
	<p>
		________________.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
