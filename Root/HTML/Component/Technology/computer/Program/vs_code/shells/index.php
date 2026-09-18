<div id='message'>
	<ol class="list-number content-list">
		<li><div>Edit settings.json (user settings).</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>"terminal.integrated.profiles.windows": {.</div></li>
	</ol>
	<h2>3.</h2>
	<p>
		"PowerShell": {.
	</p>
	<h2>4.</h2>
	<p>
		"source": "PowerShell",.
	</p>
	<h2>5.</h2>
	<p>
		"icon": "terminal-powershell",.
	</p>
	<h2>6.</h2>
	<p>
		"args": ["-ExecutionPolicy", "Bypass"],.
	</p>
	<h2>7.</h2>
	<p>
		},.
	</p>
	<h2>8.</h2>
	<p>
		"Command Prompt": {.
	</p>
	<h2>9.</h2>
	<p>
		"path": [.
	</p>
	<pre class='indent-c'><code class='block'>10.                 "${env:windir}\\Sysnative\\cmd.exe",</code></pre>
	<pre class='indent-c'><code class='block'>11.                 "${env:windir}\\System32\\cmd.exe"</code></pre>
	<h2>12.</h2>
	<p>
		],.
	</p>
	<h2>13.</h2>
	<p>
		"args": [],.
	</p>
	<h2>14.</h2>
	<p>
		"icon": "terminal-cmd".
	</p>
	<h2>15.</h2>
	<p>
		},.
	</p>
	<h2>16.</h2>
	<p>
		"Git Bash": {.
	</p>
	<h2>17.</h2>
	<p>
		"source": "Git Bash".
	</p>
	<h2>18.</h2>
	<p>
		}.
	</p>
	<h2>19.</h2>
	<p>
		},.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
