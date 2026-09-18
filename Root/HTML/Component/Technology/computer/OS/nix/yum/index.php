<div id='message'>
	<p>
		Enable a disabled yum repo for one run and print yum variables from YumBase.
	</p>
	<h2>Enable a disabled repo</h2>
	<pre class='indent-c'><code class='block'>--enablerepo=webtatic</code></pre>
	<p>
		Use this to use a repository that is otherwise disabled. Recommended to leave it disabled (<code class='inline'>enabled = 0</code>) to keep the installation state.
	</p>
	<h2>yum.conf</h2>
	<pre class='indent-c'><code class='block'>/etc/yum.conf</code></pre>
	<h2>yum variables</h2>
	<pre class='indent-c'><code class='block'>python -c 'import yum, pprint; yb = yum.YumBase(); pprint.pprint(yb.conf.yumvar, width=1)'</code></pre>
	<pre class='indent-c'><code class='block'>Loaded plugins: fastestmirror
{'arch': 'ia32e',
 'basearch': 'x86_64',
 'releasever': '5'}</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
