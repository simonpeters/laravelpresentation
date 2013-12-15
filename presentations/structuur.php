<section>
	<h1>Structuur</h1>
</section>

<section>
	<h1>Voorbeeld : #1</h1>
	<h2>MVC contact + mail</h2>
</section>

<section>
	<h1>Wat is er mis met dit voorbeeld?</h1>
	<ul>
		<li  class="fragment">NIET DRY</li>
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
	<blockquote class="fragment">A deceptive outward appearance.<br/>
&ldquo;her flawless public facade masked private despair&rdquo;</blockquote>
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
</section>

<section>
	<h1>Facade</h1>
	<ul>
		<li class="fragment">Ziet er uit als een PHP static function</li>
		<li class="fragment">BV: Form::open()</li>
		<li class="fragment">Illuminate\Support\Facades\form.php</li>
		<li class="fragment">Illuminate\Support\Facades\facade.php</li>
		<li class="fragment">__callStatic</li>
	</ul>
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