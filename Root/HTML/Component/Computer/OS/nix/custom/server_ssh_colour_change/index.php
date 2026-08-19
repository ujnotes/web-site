<div id='message'>
	<p>
		Override the <code class='inline'>ssh</code> command so the terminal background colour changes with the host you connect to.
	</p>
	<h2>Install</h2>
	<p>
		Place <code class='inline'>ssh</code> in <code class='inline'>~/.bin/</code>. Make it executable. Prepend <code class='inline'>~/.bin/</code> to <code class='inline'>PATH</code>.
	</p>
	<pre class='indent-c'><code class='block'>chmod +x ssh</code></pre>
	<h2>Wrapper</h2>
	<pre class='indent-c'><code class='block'>#!/bin/sh


HOSTNAME=`echo $@ | sed s/.*@//`


set_bg () {
  osascript -e "tell application \"Terminal\" to set background color of window 1 to $1"
}


on_exit () {
  set_bg "{25000, 0, 0, 50000}"
}
trap on_exit EXIT


case $HOSTNAME in
  prod.&lt;domain&gt;.com) set_bg "{45000, 0, 0, 50000}" ;;
  stage.&lt;domain&gt;.com) set_bg "{25000, 0, 0, 50000}" ;;
  dev.&lt;domain&gt;.com) set_bg "{15000, 0, 0, 50000}" ;;
*) set_bg "{0, 45000, 0, 50000}" ;;
esac


/usr/bin/ssh "$@"</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
