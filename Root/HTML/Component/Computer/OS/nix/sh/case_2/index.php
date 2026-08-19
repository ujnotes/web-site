<div id='message'>
	<p>
		A case branch on TEST, including a default * pattern.
	</p>
	<pre class='indent-c'><code class='block'>TEST=1112

case $TEST in
  1111) echo "1111" ;;
  1112) echo "1112" ;;
     *) echo "None"
esac</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
