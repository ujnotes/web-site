<div id='message'>
	<p>
		pg_ctl.exe -o "-p 5433" -D %PGDATA% start.
	</p>
	<p>
		@SET PATH="C:\Users\Ujjwal.Singh\AppData\Local\PostgreSQL\bin";%PATH%.
	</p>
	<p>
		@SET PGDATA=C:\Users\Ujjwal.Singh\AppData\Local\PostgreSQL\data.
	</p>
	<p>
		@SET PGDATABASE=postgres.
	</p>
	<p>
		@SET PGUSER=postgres.
	</p>
	<p>
		@SET PGPORT=5439.
	</p>
	<p>
		@SET PGLOCALEDIR=C:\Users\Ujjwal.Singh\AppData\Local\PostgreSQL\share\locale.
	</p>
	<pre class='indent-c'><code class='block'>pg_ctl.exe -o "-p 5433" -D %PGDATA% start</code></pre>
	<p>
		Should have taken PGPORT but didn’t.
	</p>
	<p>
		Status.
	</p>
	<p>
		Stops.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
