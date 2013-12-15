<section>
	<h1>Laravel routing</h1>
	<h2>Van URL naar code</h2>
    <aside class="notes">
        <ul>
            <li>Dieper op ingaan</li>
            <li>Simpel maar verwarrend</li>
            <li>Weet iemand verschil expl/impl?</li>
        </ul>
    </aside>
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
    <div class="fragment">
    <h2>Closure</h2>
    <pre><code data-trim>
Route::get('/', function(){
    echo 'hello world';
});
    </code></pre>
    </div>
<div class="fragment">
    <h2>Link to controller</h2>
	<pre><code data-trim>
Route::get('user/{id}', 'UserController@showProfile');
    </code></pre>
</div>
</section>

<section>
	<h1>Impleciete routing</h1>
</section>

<section>
	<h1>RESTFull Controller</h1>

	<pre  ><code data-trim>
Route::controller('users', 'UserController');
    </code></pre>
    <div class="fragment">
<h2>In de Controller</h2>
    <pre><code data-trim>
class UserController extends BaseController {
    public function getProfile($id)
    {
        //show profile
    }
    public function postProfile()
    {
        //create profile
    }
}
</code></pre>
    </div>
</section>

<section>
    <h1>Resource Controllers</h1>
	<pre><code data-trim>
Route::resource('photo', 'PhotoController');
    </code></pre>
    <img src="images/resourcecontrollerrouting.png">
</section>