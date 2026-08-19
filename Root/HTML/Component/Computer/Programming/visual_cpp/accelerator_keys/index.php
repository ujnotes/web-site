<div id='message'>
	<p>
		Advantage.
	</p>
	<p>
		Message always sent to the TranslateAcclerator:hWnd irrespective of focus.
	</p>
	<p>
		Thus no duplication required across window procs.
	</p>
	<p>
		________________.
	</p>
	<p>
		WinMain.
	</p>
	<p>
		HACCEL hAccel = LoadAccelerators(hInstance, L"WCODE");.
	</p>
	<p>
		While(GetMessage(&amp;msg, NULL, 0, 0) &gt; 0).
	</p>
	<h2>{</h2>
	<h4>if(!TranslateAccelerator(MainWindow.hWnd, hAccel, &amp;msg))</h4>
	<p>
		If(!IsDialogMessage(MainWindow.hWnd, &amp;msg)).
	</p>
	<h4>{</h4>
	<p>
		TranslateMessage(&amp;msg);.
	</p>
	<p>
		DispatchMessage(&amp;msg);.
	</p>
	<p>
		}.
	</p>
	<p>
		};.
	</p>
	<p>
		________________.
	</p>
	<p>
		Accelerators.rc.
	</p>
	<h3>include "Resource.h".</h3>
	<h3>include "AFXRes.h".</h3>
	<p>
		WCODE ACCELERATORS DISCARDABLE.
	</p>
	<h2>BEGIN</h2>
	<p>
		VK_TAB, MODE_BUTTON_ID, CONTROL, VIRTKEY.
	</p>
	<p>
		VK_TAB, START_FOCUS_ID, SHIFT, VIRTKEY.
	</p>
	<p>
		"c", IN_CLEAR_BUTTON_ID, ALT, VIRTKEY.
	</p>
	<p>
		"S", TOGGLE_SUG_ID, ALT, VIRTKEY.
	</p>
	<p>
		VK_SPACE, OVER_SPACE, ALT, VIRTKEY.
	</p>
	<p>
		VK_RETURN, CONVERT_BUTTON_ID, ALT, VIRTKEY.
	</p>
	<p>
		"e", IN_FOCUS, ALT, VIRTKEY.
	</p>
	<p>
		"x", CSM_CHECK_WINDOW_ID, ALT, VIRTKEY.
	</p>
	<p>
		"z", MODE_BUTTON_ID, ALT, VIRTKEY.
	</p>
	<p>
		END.
	</p>
	<p>
		________________.
	</p>
	<p>
		Resource.h.
	</p>
	<h2># define ID_ACTION</h2>
	<p>
		0x0100.
	</p>
	<p>
		________________.
	</p>
	<p>
		MainWindow - Proc.
	</p>
	<h2>case WM_COMMAND</h2>
	<h4>{</h4>
	<p>
		Switch(LOWORD(wParam)).
	</p>
	<p>
		{.
	</p>
	<h4>case ID_ACTION</h4>
	<p>
		________________.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
