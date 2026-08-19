<div id='message'>
	<p>
		Working notes on Upgrade Support: &lt;Product Id="*", Version no. (first 3 parts) must change, and &lt;MajorUpgrade.
	</p>
	<h2>&lt;Product Id="*"</h2>
	<p>
		UpgradeCode="PUT-GUID-HERE".
	</p>
	<p>
		Upgrade Code ties the series.
	</p>
	<p>
		Product Id must change across versions.
	</p>
	<pre class='indent-c'><code class='block'>Version no. (first 3 parts) must change</code></pre>
	<h4>&lt;MajorUpgrade</h4>
	<p>
		DowngradeErrorMessage="A later version of [ProductName] is already installed. Setup will now exit."/&gt;.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
