<div id='message'>
	<p>
		Working notes on build.gradle: Android, packagingOptions, defaultConfig, signingConfigs, buildTypes, and release.
	</p>
	<h2>Android</h2>
	<pre class='indent-c'><code class='block'>Android { compileSdkVersion &lt;&gt;
Android { buildToolsVersion &lt;&gt;</code></pre>
	<h2>packagingOptions</h2>
	<pre class='indent-c'><code class='block'>packagingOptions { [Exclude &lt;path&gt;]...
}.</code></pre>
	<h2>defaultConfig</h2>
	<pre class='indent-c'><code class='block'>defaultConfig { applicationId &lt;&gt;
defaultConfig { minSdkVersion &lt;&gt;
defaultConfig { targetSdkVersion &lt;&gt;
defaultConfig { versionCode &lt;&gt;
defaultConfig { versionName &lt;&gt;
defaultConfig { multiDexEnabled &lt;&gt;
}.
ProductFlavors {.
&lt;flavour&gt; {
}...
applicationId &lt;&gt;
applicationId resValue “&lt;type&gt;”, “&lt;var&gt;”, “&lt;value&gt;”
resValue def final &lt;var&gt; = “&lt;value&gt;”
def manifestPlaceholders = [&lt;var&gt;: &lt;value&gt;]</code></pre>
	<h2>signingConfigs</h2>
	<pre class='indent-c'><code class='block'>signingConfigs { &lt;flavour&gt; {
storeFile file("&lt;path&gt;”)
storeFile storePassword "&lt;&gt;”
storePassword keyAlias “&lt;&gt;”
keyAlias keyPassword “&lt;&gt;”
}.
}.</code></pre>
	<h2>buildTypes</h2>
	<h2>release</h2>
	<pre class='indent-c'><code class='block'>release { productFlavors.&lt;flavor1&gt;.signingConfig signingConfigs.&lt;config1&gt;
release { productFlavors.&lt;flavor2&gt;.signingConfig signingConfigs.&lt;config2&gt;</code></pre>
	<p>
		MinifyEnabled true.
	</p>
	<pre class='indent-c'><code class='block'>proguardFiles getDefaultProguardFile('proguard-android.txt'),</code></pre>
	<p>
		'proguard-rules.pro'.
	</p>
	<pre class='indent-c'><code class='block'>}.
}.
}.</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
