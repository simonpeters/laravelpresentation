<section>
	<h1>Laravel routing</h1>
	<h2>Van URL naar code</h2>
</section>

<section>
	<h1>2 soorten routing</h1>
	<ul>
		<li><h3>Expleciet</h3></li>
		<li><h3>Impleciet</h3></li>
	</ul>
</section>

<section>
	<h1>Expleciete routing</h1>
	<h2>Closure</h2>
	<pre><code data-trim>
Route::get('/', function(){
	echo 'hello world';
});
    </code></pre>
    <h2>Link to controller</h2>
	<pre><code data-trim>
Route::get('user/{id}', 'UserController@showProfile');
    </code></pre>
</section>

<section>
	<h1>Impleciete routing</h1>
	<h2>Closure</h2>
	<pre><code data-trim>
Route::get('/', function(){
	echo 'hello world';
});
    </code></pre>
    <h2>Link to controller</h2>
	<pre><code data-trim>
Route::get('user/{id}', 'UserController@showProfile');
    </code></pre>
</section>