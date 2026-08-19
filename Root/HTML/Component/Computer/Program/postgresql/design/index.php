<div id='message'>
	<p>
		Serial.
	</p>
	<p>
		CREATE SEQUENCE user_id_seq;.
	</p>
	<h2>CREATE TABLE user (</h2>
	<p>
		User_id smallint NOT NULL DEFAULT nextval('user_id_seq').
	</p>
	<p>
		);.
	</p>
	<p>
		ALTER SEQUENCE user_id_seq OWNED BY user.user_id;.
	</p>
	<h2>Foreign</h2>
	<pre class='indent-c'><code class='block'>Foreign REFERENCES &lt;Table&gt;((&lt;column&gt;))</code></pre>
	<h4>is still referenced from table</h4>
	<p>
		ON DELETE [CASCADE|Restrict].
	</p>
	<h2>Constraint</h2>
	<p>
		Unique.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
