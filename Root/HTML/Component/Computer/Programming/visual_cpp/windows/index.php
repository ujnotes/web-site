<div id='message'>
	<p>
		Register Window Class.
	</p>
	<p>
		Create Window of the type registered.
	</p>
	<h2>WM_CREATE is an Extension of the CreateWindow Fn call</h2>
	<p>
		And is executed before the Fn returns.
	</p>
	<p>
		WM_GETMINMAXINFO.
	</p>
	<p>
		WM_NCCREATE.
	</p>
	<p>
		WM_NCCALCSIZE.
	</p>
	<p>
		WM_CREATE.
	</p>
	<p>
		Show the window.
	</p>
	<p>
		Applications create their main window by calling CreateWindow with the WS_VISIBLE flag set.
	</p>
	<p>
		Applications create their main window by calling CreateWindow with the WS_VISIBLE flag cleared, and later call ShowWindow with the SW_SHOW flag set to make it visible.
	</p>
	<h2>Message Loop</h2>
	<p>
		Get Message.
	</p>
	<p>
		Dispatch Message.
	</p>
	<h2>Parent Window Object</h2>
	<p>
		Contain individual hWnds for controls.
	</p>
	<h2>SendMessage</h2>
	<pre class='indent-c'><code class='block'>(&lt;L|P&gt;PARAM)MAKELONG(LOWORD, HIGHWORD);</code></pre>
	<p>
		________________.
	</p>
	<h2>SubClassing</h2>
	<p>
		WinAPI.
	</p>
	<p>
		For example, an Edit Control’s default message handler can be overriden to handle specific messages.
	</p>
	<p>
		And will call the base handler for the remaining messages.
	</p>
	<p>
		Should reset it before exit (but why - how is it global).
	</p>
	<p>
		SetWindowLong [SetWindowLongPtr - GWLP_WNDPROC for both x86 &amp; x64 compaitbility).
	</p>
	<h2>DialogBox Get Tab &amp; Enter</h2>
	<h4>SubClass</h4>
	<h4>if (uMsg == WM_GETDLGCODE)</h4>
	<p>
		Return DLGC_WANTALLKEYS;.
	</p>
	<p>
		________________.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
