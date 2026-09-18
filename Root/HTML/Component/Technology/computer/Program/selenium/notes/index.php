<div id='message'>
	<h2>1. Get Selenium web driver</h2>
	<ol class="list-number content-list">
		<li><div>npm i selenium-webdriver.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>Install nodejs if needed for npm.</div></li>
	</ol>
	<h2>2. Get Web-driver for chrome</h2>
	<ol class="list-number content-list">
		<li><div>Version Selection - ChromeDriver.</div></li>
	</ol>
	<h4>2. Get your browser version</h4>
	<p>
		Menu &gt; Help &gt; About Google Chrome.
	</p>
	<h4>3. Get webdriver build number</h4>
	<pre class='indent-c'><code class='block'>1. https://chromedriver.storage.googleapis.com/LATEST_RELEASE_&lt;browser_version&gt;</code></pre>
	<ol class="list-number content-list">
		<li><div>https://chromedriver.storage.googleapis.com/LATEST_RELEASE_83.</div></li>
	</ol>
	<h4>4. Get webdriver</h4>
	<pre class='indent-c'><code class='block'>4. Get webdriver 1. https://chromedriver.storage.googleapis.com/index.html?path=&lt;webdriver_build_number&gt;/</code></pre>
	<ol class="list-number content-list">
		<li><div>Choose win32 file.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>https://chromedriver.storage.googleapis.com/index.html?path=83.0.4103.39.</div></li>
	</ol>
	<h2>3. Place the webdriver file at</h2>
	<ol class="list-number content-list">
		<li><div>C:\Programs\Selenium.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>Add to PATH environment variable.</div></li>
	</ol>
	<h2>5. Run script</h2>
	<pre class='indent-c'><code class='block'>5. Run script 1. node &lt;test&gt;.js</code></pre>
	<h2>6. Gotchas</h2>
	<h4>1. “this version of chromedriver only supports chrome version”</h4>
	<ol class="list-number content-list">
		<li><div>Webdriver version mismatch. Download updated version.</div></li>
	</ol>
	<h2>7. Get extension</h2>
	<ol class="list-number content-list">
		<li><div>https://chrome.google.com/webstore/detail/selenium-ide/mooikfkahbdckldjjndioackbalphokd.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>Record steps.</div></li>
	</ol>
	<h2>9. Export</h2>
	<ol class="list-number content-list">
		<li><div>Choose “Tests”.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>From the menu on hover - select export : JS mocha.</div></li>
	</ol>
	<p>
		CSV extension.
	</p>
	<p>
		<strong>1. abhijain2618/csvreader.</strong> Code for CSV file reader plugin for Selenium IDE.
	</p>
	<ol class="list-number content-list">
		<li><div>Selenium CSV File Reader Plugin (https://medium.com/@kcmueller/browser-task-automation-with-firefox-and-csv-files-3a94a49c75b8).</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>Browser task automation with Firefox and CSV files.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>How to read an excel file contents on client side?</div></li>
	</ol>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
