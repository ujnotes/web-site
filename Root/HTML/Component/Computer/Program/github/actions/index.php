<div id='message'>
	<h2>Pull repo from another</h2>
	<h4>steps</h4>
	<h2>jobs</h2>
	<h4>- name: checkout repo</h4>
	<p>
		<strong>uses.</strong> Actions/checkout@v2.
	</p>
	<h4>with</h4>
	<pre class='indent-c'><code class='block'>repository:&lt;user&gt;/&lt;repo&gt;</code></pre>
	<pre class='indent-c'><code class='block'>ref: ${{ vars.ENV }}</code></pre>
	<pre class='indent-c'><code class='block'>token: ${{ secrets.PAT_TOKEN }}</code></pre>
	<p>
		<strong>path.</strong> .
	</p>
	<h2>?Same user’s repos</h2>
	<h4>secrets.GITHUB_TOKEN</h4>
	<p>
		Initialised by default.
	</p>
	<h2>2. PAT : personal access token</h2>
	<h4>from github account &gt; Developer settings (bottom left in the settings page)</h4>
	<p>
		&gt; classic token &gt; repo access.
	</p>
	<p>
		Modern tokens were unable to access.
	</p>
	<ol class="list-number content-list">
		<li><div>Place PAT in github secret of the repo.</div></li>
	</ol>
	<h2>Use branch (created by PR) to test action</h2>
	<p>
		Actions UI lets user select branch.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
