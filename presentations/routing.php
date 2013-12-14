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
</section>

<section>
	<h1>RESTFull Controller</h1>
	<pre><code data-trim>
Route::controller('users', 'UserController');
    </code></pre>
    <h2>In de Controller</h2>
    <pre><code data-trim>
class UserController extends BaseController {
    public function getProfile()
    {
        //
    }
    public function postProfile()
    {
        //
    }
}
    </code></pre>
</section>

<section>
    <h1>Resource Controllers</h1>
	<pre><code data-trim>
Route::resource('photo', 'PhotoController');
    </code></pre>
    <img src="images/resourcecontrollerrouting.png">
</section>