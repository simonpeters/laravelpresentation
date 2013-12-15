<section>
<section>
	<h1>Events</h1>
		<blockquote>
		&ldquo;The Laravel Event class provides a simple observer implementation, allowing you to subscribe and listen for events in your application.&rdquo;
	</blockquote>
</section>
<section>
<h1>Listening</h1>
	<div class="fragment">
		<h2>Scope</h2>
<pre><code data-trim>
Event::listen('user.login', function($user)
{
    $user->last_login = new DateTime;
    $user->save();
});
</code></pre>
	</div>
	<div class="fragment">
	<h2>Controller</h2>
<pre class="PHP"><code data-trim class="PHP">
Event::listen('user.login', 'LoginHandler');
</code></pre>
	</div>
</section>
<section>
	<h2>Waar naar events luisteren?</h2>
	<p class="fragment">kan overal, best in 'app/start/global.php'.</p>
</section>
<section>
	<h2>Events afvuren</h2>
<pre class="fragment"><code data-trim>
$event = Event::fire('user.login', array($user));
</code></pre>

</section>
</section>