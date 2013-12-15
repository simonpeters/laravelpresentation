<section>
    <h1>Structuur</h1>
    <aside class="notes">
        <ul>
            <li>Public</li>
            <ul>
                <li>Index.php</li>
            </ul>
            <li>Bootstrap</li>
            <li>Vendor/composer</li>
            <ul>
                <li>Autoload</li>
            </ul>
        </ul>
        <ul>
            <li>App</li>
            <ul>
                <li>MVC</li>
                <li>DB</li>
                <li>routes.php</li>
                <li>filter.php</li>
            </ul>           
        </ul>
    </aside>
</section>

<section>
    <h1>Voorbeeld : #1</h1>
    <h2>MVC contact + mail</h2>
</section>

<section>
    <h1>Wat is er mis met dit voorbeeld?</h1>
    <ul>
        <li  class="fragment">Niet DRY</li>
        <li  class="fragment">Niet OO</li>
        <li  class="fragment">Niet MVC</li>
    </ul>
    
</section>

<section>
    <h3>Hoe oplossen?</h3>
    <h1 class="fragment">Facades</h1>
</section>

<section>
    <h1>Warning: Advanced stuff</h1>
</section>

<section>
    <h1 >Facades</h1>
    <blockquote class="fragment">&ldquo;A deceptive outward appearance.&rdquo;</blockquote>
    <ul>
        <li  class="fragment">Uniek voor Laravel</li>
        <li  class="fragment">Facades zitten overal in laravel</li>
        <li  class="fragment">Iedereen heeft facades (onbewust) al gebruikt</li>
    </ul>
</section>

<section>
        <h1 class="fragment">Wat is een Facade?</h1>
    <pre class="fragment"><code data-trim>
Form::open()
    </code></pre>
    <pre class="fragment"><code data-trim>
Event::listen()
    </code></pre>
    <pre class="fragment"><code data-trim>
Route::get()
    </code></pre>
    <aside class="notes">
        Vraag wat open precies is. Static function van een klasse?
    </aside>
</section>

<section>
    <h3>Form::open()</h3>
    <h4 class="fragment">Form klasse komt uit <br/>'vendor\laravel\framework\src\Illuminate\Support\Facades\Form.php'</h4>
<pre class="fragment"><code data-trim>
class Form extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'form'; }

}
</code></pre>
</section>
    
<section>
    <h3>Waar is de Form::open() code?</h3>
    <h4  class="fragment">'vendor\laravel\framework\src\Illuminate\Html\FormBuilder.php'</h4>
<pre class="fragment"><code data-trim>
use Illuminate\Routing\UrlGenerator;
use Illuminate\Html\HtmlBuilder as Html;
use Illuminate\Session\Store as Session;

class FormBuilder {

    ...

    /**
     * Open up a new HTML form.
     *
     * @param  array   $options
     * @return string
     */
    public function open(array $options = array())
    {
        ...
    }

    ...

}
</code></pre>
<aside class="notes">
    public function open?
</aside>
</section>

<section>
    <h1>Facade</h1>
    <ul>
        <li class="fragment">Ziet er uit als een klasse met een PHP static function</li>
        <li class="fragment">Maar blijkt gewoon bijna lege klasse te zijn</li>
        <li class="fragment">En de echte 'klasse' is ergens anders</li>
        <li class="fragment">...</li>
    </ul>
    <aside class="notes">Hoe gaan we van onze Facade klasse naar de echte code</aside>
</section>

<section>
<pre class="fragment"><code data-trim>
class Form extends Facade {
</code></pre>
<h4 class="fragment">vendor\laravel\framework\src\Illuminate\Support\Facades\Facade.php</h4>
<pre class="fragment"><code data-trim>
abstract class Facade {

  ...

  /**
  * Handle dynamic, static calls to the object.
  *
  * @param  string  $method
  * @param  array   $args
  * @return mixed
  */
  public static function __callStatic($method, $args)
  {
    $instance = static::resolveFacadeInstance(static::getFacadeAccessor());

    ...

    return $instance->$method();

    ...

  }

}
</code></pre>   
</section>

<section>
    <h1>__callStatic</h1>
    <ul>
        <li class="fragment">Wordt opgeroepen als er een static function call is die de klasse niet herkent.</li>
<pre class="fragment"><code data-trim>
$instance = static::resolveFacadeInstance(static::getFacadeAccessor());
</code></pre>
        <ul>
            <li class="fragment">static::getFacadeAccessor()</li>
            <ul class="fragment">
                <li>Ingesteld in uw facade ( in ons voorbeeld 'form' )</li>
            </ul>
            <pre class="fragment"><code data-trim>
$instance = static::resolveFacadeInstance('form');
</code></pre>
            <li class="fragment">resolveFacadeInstance()</li>
            <ul class="fragment">
                <li>Gaat kijken of er al een instantie bestaat van 'form'</li>
                <ul>
                    <li class="fragment">Nee: maak een instantie aan.</li>
                    <li class="fragment">Ja: Gebruik die instantie.</li>
                </ul>
            </ul>
        </ul>
    </ul>
<pre class="fragment"><code data-trim>
$instance->$method();
</code></pre>
<pre class="fragment"><code data-trim>
$form->open();
</code></pre>
</section>

<section>
    <h1>Wrapup</h1>
    <ul class="fragment">
        <li class="fragment">Facade biedt een static looking interface aan</li>
        <li class="fragment">Initaliseert en houdt klasses bij voor u</li>
        <li class="fragment">Zijn dus geen static functions</li>
        <ul >
            <li class="fragment">Testable</li>
            <li class="fragment">Object Oriented</li>
        </ul>
    </ul>
</section>