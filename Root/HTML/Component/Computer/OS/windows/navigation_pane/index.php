<div id='message'>
	<h2>Root Explorer at a path</h2>
	<p>
		Add a path at root level to Explorer:
	</p>
	<pre class='indent-c'><code class='block'>explorer.exe /e,/root,&lt;Path&gt;</code></pre>
	<h2>Hide navigation pane items (x86)</h2>
	<h4>Remove Favorites</h4>
	<pre class='indent-c'><code class='block'>[HKEY_CLASSES_ROOT\CLSID\{323CA680-C24D-4099-B94D-446DD2D7249E}\ShellFolder]
“Attributes”=dword:a0900100</code></pre>
	<p>
		Changing <code class='inline'>a0900100</code> to <code class='inline'>a9400100</code> will hide Favorites from the Navigation Pane.
	</p>
	<h4>Remove Libraries</h4>
	<pre class='indent-c'><code class='block'>[HKEY_CLASSES_ROOT\CLSID\{031E4825-7B94-4dc3-B131-E946B44C8DD5}\ShellFolder]
“Attributes”=dword:b080010d</code></pre>
	<p>
		Changing <code class='inline'>b080010d</code> to <code class='inline'>b090010d</code> will hide Libraries from the Navigation Pane.
	</p>
	<h4>Remove Network</h4>
	<pre class='indent-c'><code class='block'>[HKEY_CLASSES_ROOT\CLSID\{F02C1A0D-BE21-4350-88B0-7367FC96EF3C}\ShellFolder]
“Attributes”=dword: b0940064</code></pre>
	<p>
		This first part is, in the 32-bit world, the solution for Windows Explorer and the Common File Dialog. In the 64-bit world you need another registry key edited. This is basically the same key, but in the Wow6432Node folder within the registry.
	</p>
	<h2>Hide navigation pane items (x64)</h2>
	<h4>Remove Favorites</h4>
	<pre class='indent-c'><code class='block'>[HKEY_CLASSES_ROOT\Wow6432Node\CLSID\{323CA680-C24D-4099-B94D-446DD2D7249E}\ShellFolder]
“Attributes”=dword:a0900100</code></pre>
	<p>
		Changing <code class='inline'>a0900100</code> to <code class='inline'>a9400100</code> will hide Favorites from the Navigation Pane.
	</p>
	<h4>Remove Libraries</h4>
	<pre class='indent-c'><code class='block'>[HKEY_CLASSES_ROOT\Wow6432Node\CLSID\{031E4825-7B94-4dc3-B131-E946B44C8DD5}\ShellFolder]
“Attributes”=dword:b080010d</code></pre>
	<p>
		Changing <code class='inline'>b080010d</code> to <code class='inline'>b090010d</code> will hide Libraries from the Navigation Pane.
	</p>
	<h4>Remove Network</h4>
	<pre class='indent-c'><code class='block'>[HKEY_CLASSES_ROOT\Wow6432Node\CLSID\{F02C1A0D-BE21-4350-88B0-7367FC96EF3C}\ShellFolder]
“Attributes”=dword: b080010d</code></pre>
	<p>
		Changing <code class='inline'>b080010d</code> to <code class='inline'>b090010d</code> will hide Libraries from the Navigation Pane.
	</p>
	<h2>Show all folders</h2>
	<p>
		Right-click the navigation pane and choose Show all folders.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
