<div id='message'>
	<p>
		A MVC framework based on PHP.
	</p>
	<pre class='indent-c'><code class='block'>php artisan make:migrations &lt;&gt;.php</code></pre>
	<pre class='indent-c'><code class='block'>composer create-project laravel/laravel public_html --prefer-dist</code></pre>
	<p>
		Begins with direct or catch all .php.
	</p>
	<h2>Routes</h2>
	<p>
		Routes.php.
	</p>
	<h2>&lt;?php</h2>
	<pre class='indent-c'><code class='block'>&lt;?php Route::get(‘&lt;path:/[{var}]&gt;’, ‘&lt;&gt;Controller@&lt;&gt;’|function(){ … return View::make(‘’)-&gt;with([params, …]});</code></pre>
	<h2>Error</h2>
	<p>
		App/start/global.php.
	</p>
	<p>
		App::missing(function($exception).
	</p>
	<h2>{</h2>
	<p>
		Return Response::view('errors.missing', array(), 404);.
	</p>
	<p>
		});.
	</p>
	<pre class='indent-c'><code class='block'>View::make('&lt;text&gt;’)</code></pre>
	<p>
		View::make(path).
	</p>
	<h2>'index'</h2>
	<p>
		App/views/index.php.
	</p>
	<h4>index.foo</h4>
	<p>
		App/views/index/foo.php.
	</p>
	<p>
		<strong>two extensions.</strong> .php or .blade.php.
	</p>
	<h2>Log</h2>
	<p>
		Info.
	</p>
	<p>
		Warning.
	</p>
	<p>
		Error.
	</p>
	<p>
		Listener.
	</p>
	<p>
		Log::listen(function($level, $message, $context).
	</p>
	<p>
		{.
	</p>
	<p>
		});.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
