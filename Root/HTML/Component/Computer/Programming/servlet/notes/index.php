<div id='message'>
	<p>
		Working notes on Notes: Get session, Forward, Redirect, and GetSessionAttribute.
	</p>
	<h2>Get session</h2>
	<p>
		HTTPSession.getSession().
	</p>
	<h2>Forward</h2>
	<p>
		Internal.
	</p>
	<p>
		Static reads.
	</p>
	<p>
		HTTPRequest.getRequestDispathcer("_").forward(request, response).
	</p>
	<h2>Redirect</h2>
	<p>
		External.
	</p>
	<p>
		Post and Writes.
	</p>
	<p>
		HTTPResponse.sendRedirect(“_).
	</p>
	<p>
		ServletInputStream ReqQuery_Post = ((HttpServletRequest) request).getInputStream();.
	</p>
	<h2>GetSessionAttribute</h2>
	<p>
		Dynamic casting not supported.
	</p>
	<p>
		A holder object is required.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
