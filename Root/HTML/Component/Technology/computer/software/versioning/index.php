<div id='message'>
	<p>
		https://dev.to/saurabhdaware/but-what-the-hell-is-package-lock-json-b04
	</p>
	<h2>Semantic versioning</h2>
	<p>
		Major . Minor . Bugs / Iteration
	</p>
	<ul class="list-bullet content-list">
		<li><div>Bugs — no features added or removed</div></li>
		<li><div>Minor — backward compatible within the same major version</div></li>
		<li><div>Major — backward incompatible</div></li>
	</ul>
	<h2>Notes (concise)</h2>
	<p>
		AI generated.
	</p>
	<h4>Core</h4>
	<p>
		Format: <code class='inline'>MAJOR.MINOR.PATCH</code>
	</p>
	<ul class="list-bullet content-list">
		<li><div>MAJOR → breaking</div></li>
		<li><div>MINOR → backward-compatible feature</div></li>
		<li><div>PATCH → backward-compatible fix</div></li>
	</ul>
	<h4>Non-code changes</h4>
	<p>
		Docs/README only → no version bump.
	</p>
	<p>
		Same version can have multiple builds.
	</p>
	<h4>Build metadata</h4>
	<p>
		Syntax: <code class='inline'>1.2.3+meta</code>
	</p>
	<p>
		Examples:
	</p>
	<ul class="list-bullet content-list">
		<li><div><code class='inline'>0.8.7+docs.1</code></div></li>
		<li><div><code class='inline'>0.8.7+keyboard-svg.1</code></div></li>
	</ul>
	<p>
		Rules:
	</p>
	<ul class="list-bullet content-list">
		<li><div>ignored for precedence (treated same as <code class='inline'>1.2.3</code>)</div></li>
		<li><div>allowed chars: <code class='inline'>[0-9A-Za-z-]</code>, use <code class='inline'>.</code> separator</div></li>
	</ul>
	<h4>Pre-release (if needed)</h4>
	<p>
		<code class='inline'>1.2.3-beta.1</code> (affects ordering)
	</p>
	<h4>4th number</h4>
	<p>
		<code class='inline'>1.2.3.4</code> → common but non-SemVer. Prefer <code class='inline'>+build</code> instead.
	</p>
	<h4>Releases vs builds</h4>
	<p>
		Don't publish multiple "releases" with only <code class='inline'>+meta</code>.
	</p>
	<p>
		Use:
	</p>
	<ul class="list-bullet content-list">
		<li><div>single release: <code class='inline'>v0.8.7</code></div></li>
		<li><div>artifacts with metadata</div></li>
	</ul>
	<h4>Rule of thumb</h4>
	<ul class="list-bullet content-list">
		<li><div>behavior change → bump version</div></li>
		<li><div>rebuild/docs → metadata only</div></li>
	</ul>
	<p>
		Caveat: some tooling ignores or strips <code class='inline'>+meta</code> entirely.
	</p>
	<h2>Keep the same tag</h2>
	<ol class="list-number content-list">
		<li><div>Keep tag/release: <code class='inline'>v0.8.7</code></div></li>
		<li><div>Rename old artifact:</div></li>
	</ol>
	<p>
		- <code class='inline'>app-0.8.7+original.zip</code> - or <code class='inline'>app-0.8.7+build.1.zip</code>
	</p>
	<ol class="list-number content-list">
		<li><div>Upload new artifact:</div></li>
	</ol>
	<p>
		- <code class='inline'>app-0.8.7+docs.1.zip</code>
	</p>
	<ol class="list-number content-list">
		<li><div>Add release note:</div></li>
	</ol>
	<h4>Build artifacts</h4>
	<ul class="list-bullet content-list">
		<li><div><code class='inline'>app-0.8.7+build.1.zip</code> — original release artifact</div></li>
		<li><div><code class='inline'>app-0.8.7+docs.1.zip</code> — README/docs update only; no code change</div></li>
	</ul>
	<p>
		If you already deleted the GitHub release asset, recover from:
	</p>
	<ul class="list-bullet content-list">
		<li><div>local build output</div></li>
		<li><div>CI artifact history</div></li>
		<li><div>GitHub Actions run artifacts</div></li>
		<li><div>backup/downloaded copy</div></li>
	</ul>
	<p>
		Best rule: one tag, many named assets.
	</p>
	<p>
		Indicate latest release artifact: use one tag + mark asset clearly.
	</p>
	<p>
		Inside GitHub release (<code class='inline'>v0.8.7</code>), name assets:
	</p>
	<ul class="list-bullet content-list">
		<li><div><code class='inline'>app-0.8.7+build.1.zip</code></div></li>
		<li><div><code class='inline'>app-0.8.7+docs.1.zip</code></div></li>
		<li><div><code class='inline'>app-0.8.7-latest.zip</code> (alias)</div></li>
	</ul>
	<p>
		No real alias in GitHub artifact, hence two options:
	</p>
	<ol class="list-number content-list">
		<li><div>Upload a copy file — with <code class='inline'>latest</code> in the filename</div></li>
		<li><div>Indicate the latest filename in the release title</div></li>
	</ol>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
