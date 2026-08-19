<div id='message'>
	<p>
		Run <code class='inline'>TaskSched.msc</code>. From the Action pane, click <strong>Create Task…</strong>.
	</p>
	<h2>General</h2>
	<ul class="list-bullet content-list">
		<li><div>Name: <code class='inline'>Start Outlook at logon</code></div></li>
		<li><div>Description: <code class='inline'>Starting Outlook via a delayed start</code></div></li>
	</ul>
	<h2>Triggers</h2>
	<p>
		New trigger:
	</p>
	<ul class="list-bullet content-list">
		<li><div>Begin the task: <strong>At log on</strong></div></li>
		<li><div>Specific user: your user account (selected automatically)</div></li>
		<li><div>Delay task for: <strong>2 minutes</strong></div></li>
		<li><div>Enabled: selected</div></li>
	</ul>
	<p>
		OK to close the New Trigger dialog.
	</p>
	<h2>Actions</h2>
	<p>
		New action. Browse to <code class='inline'>OUTLOOK.EXE</code>. Depending on Outlook and Windows:
	</p>
	<pre class='indent-c'><code class='block'>C:\Program Files\Microsoft Office\Office##
C:\Program Files (x86)\Microsoft Office\Office##</code></pre>
	<p>
		In <strong>Add arguments (optional)</strong> type:
	</p>
	<pre class='indent-c'><code class='block'>/recycle</code></pre>
	<p>
		OK to close the New Action dialog.
	</p>
	<h2>Settings</h2>
	<p>
		Disable <strong>Stop the task if it runs longer than 3 days</strong>. That keeps Outlook from being closed if the computer stays on longer than 3 days.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
