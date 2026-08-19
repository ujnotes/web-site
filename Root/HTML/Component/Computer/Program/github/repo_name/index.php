<div id='message'>
	<p>
		https://stackoverflow.com/questions/37635517/how-do-i-rename-a-local-only-repository-on-github-desktop-without-renaming-r
	</p>
	<p>
		https://github.com/desktop/desktop/issues/2037
	</p>
	<p>
		Collapse..
	</p>
	<p>
		<strong>Update.</strong> File has moved to ?.
	</p>
	<p>
		Git syn’s name with the directories name.
	</p>
	<pre class='indent-c'><code class='block'>%LocalAppData%\GitHub\Cache.db</code></pre>
	<pre class='indent-c'><code class='block'>Replace(insert) &lt;project name&gt; against ‘Name’</code></pre>
	<pre class='indent-c'><code class='block'>Format: &lt;path&gt; ‘Name’ &lt;Project name&gt;</code></pre>
	<p>
		‘find’ to determine the one.
	</p>
	<p>
		Use snippet.
	</p>
	<h2>function getElementByXpath(path) {</h2>
	<p>
		Return document.evaluate(path, document, null, XPathResult.FIRST_ORDERED_NODE_TYPE, null).singleNodeValue;.
	</p>
	<p>
		}.
	</p>
	<h2>function overrideRepoNames(repoNames) {</h2>
	<h4>for (x in repoNames) {</h4>
	<p>
		GetElementByXpath('//*[@id="__ListRow_1-' + (parseInt(x) + 1) + '"]/div/div[2]/span/span').innerHTML = repoNames[x].replace(new RegExp('\\\\','g'), ' \\ ').
	</p>
	<p>
		}.
	</p>
	<p>
		}.
	</p>
	<p>
		RepoNames = ['Ujnotes\\Website\\Framework', 'WCode\\Website\\Framework', 'WCode\\Website\\interim', 'WCode\\Location\\interim', 'Ujnotes\\Website\\interim', 'WCode\\Location\\Paper', 'WCode\\Website\\Project', 'WCode\\Android\\Project', 'WCode\\Windows\\Project', 'WCode\\Location\\Project', 'Ujnotes\\Website\\Project'];.
	</p>
	<h2>getElementByXpath('//*[@id="desktop-app-toolbar"]/div[1]/div/div/button').addEventListener('click', function(event) {</h2>
	<h4>setTimeout(function() {</h4>
	<h4>if(getElementByXpath('//*[@id="foldout-container"]') != null)</h4>
	<p>
		OverrideRepoNames(repoNames).
	</p>
	<p>
		}, 50);.
	</p>
	<p>
		});.
	</p>
	<h2>Here is <code class='inline'>AHK</code> script to automate the execution of the script snippet at launch</h2>
	<p>
		Run, "%LocalAppData%\GitHubDesktop\GitHubDesktop.exe".
	</p>
	<p>
		WinWait, GitHub Desktop.
	</p>
	<p>
		Sleep, 1000.
	</p>
	<p>
		Send, {CTRLDOWN}{SHIFTDOWN}i{SHIFTUP}{CTRLUP}.
	</p>
	<p>
		Sleep, 2000.
	</p>
	<p>
		Send, {CTRLDOWN}{SHIFTDOWN}p{SHIFTUP}{CTRLUP}.
	</p>
	<p>
		Sleep, 2000.
	</p>
	<p>
		Send, {BACKSPACE}.
	</p>
	<p>
		Sleep, 100.
	</p>
	<p>
		Send, {!}.
	</p>
	<p>
		Sleep, 100.
	</p>
	<p>
		Send, {ENTER}.
	</p>
	<p>
		Sleep, 500.
	</p>
	<p>
		Send, {CTRLDOWN}{SHIFTDOWN}i{SHIFTUP}{CTRLUP}.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
