<div id='message'>
	<p>
		Package ..;.
	</p>
	<p>
		Imports java.io.IOException;.
	</p>
	<p>
		Imports java.io.InputStream;.
	</p>
	<p>
		Imports java.io.OutputStream;.
	</p>
	<p>
		Imports javax.servlet.ServletContext;.
	</p>
	<p>
		Imports javax.servlet.annotation.WebServlet;.
	</p>
	<p>
		Imports javax.servlet.http.HttpServlet;.
	</p>
	<p>
		Imports javax.servlet.http.HttpServletRequest;.
	</p>
	<p>
		Imports javax.servlet.http.HttpServletResponse;.
	</p>
	<p>
		@WebServlet("/Download").
	</p>
	<h2>public class Download extends HttpServlet{</h2>
	<p>
		Private static final int BYTES_DOWNLOAD = 1024;.
	</p>
	<h4>public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException{</h4>
	<p>
		Response.setContentType("text/plain");.
	</p>
	<p>
		Response.setHeader("Content-Disposition", "attachment;filename=downloadname.txt");.
	</p>
	<p>
		ServletContext ctx = getServletContext();.
	</p>
	<p>
		InputStream is = ctx.getResourceAsStream("/testing.txt");.
	</p>
	<p>
		Int read=0;.
	</p>
	<p>
		Byte[] bytes = new byte[BYTES_DOWNLOAD];.
	</p>
	<p>
		OutputStream os = response.getOutputStream();.
	</p>
	<pre class='indent-c'><code class='block'>while((read = is.read(bytes))!= -1){</code></pre>
	<p>
		Os.write(bytes, 0, read);.
	</p>
	<p>
		}.
	</p>
	<p>
		Os.flush();.
	</p>
	<p>
		Os.close();.
	</p>
	<p>
		}.
	</p>
	<p>
		}.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
