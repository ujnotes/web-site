<div id='message'>
	<p>
		Working notes on ClipBoard: if(OpenClipboard(NULL)) and if(!SetClipboardData(CF_TEXT, hMem)).
	</p>
	<h2>if(OpenClipboard(NULL))</h2>
	<p>
		###
	</p>
	<p>
		EmptyClipboard();.
	</p>
	<p>
		HGLOBAL hMem = GlobalAlloc(GMEM_DDESHARE, 33);.
	</p>
	<p>
		LPTSTR ptxt = (LPTSTR)GlobalLock(hMem);.
	</p>
	<p>
		Strcpy_s((char *)ptxt, 33, szMD5);.
	</p>
	<p>
		GlobalUnlock(hMem);.
	</p>
	<pre class='indent-c'><code class='block'>if(!SetClipboardData(CF_TEXT, hMem))</code></pre>
	<p>
		MessageBox(NULL, L"Error during copy", L"hi", MB_OK);.
	</p>
	<p>
		CloseClipboard();.
	</p>
	<pre class='indent-c'><code class='block'>}.</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
