<div id='message'>
	<pre class='indent-c'><code class='block'>--enable-accelerated-vpx-decode</code></pre>
	<h2>chrome://gpu</h2>
	<p>
		Video Acceleration Information.
	</p>
	<p>
		Should show vp9.
	</p>
	<p>
		https://www.reddit.com/r/Amd/comments/7jd7kl/vp9_opencl_hybrid_acceleration_gone_for_a_while
	</p>
	<p>
		<strong>Last working.</strong> 17.10.1.
	</p>
	<p>
		<strong>EDIT 1.</strong> AMD removed support with 17.10.2. Not sure if this is only on Windows 10 1709, or all versions of Windows, but I strongly suspect the latter.
	</p>
	<p>
		<strong>EDIT 2.</strong> AMD removed all of the VP9 decoder references from the UVD DLL in 17.10.2, and removed the VP9 hybrid decoder DLL as of 17.12.1. Looks like they've dropped support, reached out for official confirmation.
	</p>
	<pre class='indent-c'><code class='block'>HKEY_LOCAL_MACHINE\SYSTEM\ControlSet001\Control\Class\{4d36e968-e325-11ce-bfc1-08002be10318}\0000\UMD\DXVA\VForceOCLVP9</code></pre>
	<p>
		https://www.youtube.com/watch?v=tO01J-M3g0U
	</p>
	<p>
		https://community.amd.com/thread/208915
	</p>
	<pre class='indent-c'><code class='block'>chrome.exe --enable-accelerated-vpx-decode=2</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
