<section id="carbon">
<section>
	<h1>Carbon</h1>
	<p>Carbon is een PHP tool voor met datums te werken</p>
	<p>Zit in elke laravel installatie</p>
</section>
<section>
	<h2>Voorbeelden</h2>
<pre class="fragment"><code data-trim class="PHP">
echo Carbon::now(); // => 2013-12-15 13:27:47
</code></pre>
<pre class="fragment"><code data-trim class="PHP">
echo Carbon::now()->addDays(4); // => 2013-12-19 13:27:47
</code></pre>
<pre class="fragment"><code data-trim class="PHP">
echo Carbon::tomorrow(); // => 2013-12-16 00:00:00
</code></pre>
<pre class="fragment"><code data-trim class="PHP">
echo Carbon::tomorrow()->diffForHumans(); // => 10 hours from now
</code></pre>
<pre class="fragment"><code data-trim class="PHP">
echo Carbon::now()->addMonths(1)->diffForHumans(); // => 1 month ago
</code></pre>
<pre class="fragment"><code data-trim class="PHP">
echo Carbon::now()->format('l jS \\of F Y h:i:s A'); 
// => Sunday 15th of December 2013 01:41:56 PM
</code></pre>
</section>
<section>
	<h2>In laravel</h2>
	<p>Created_at & updated_at zijn al carbon dates</p>
<pre class="fragment"><code data-trim class="PHP">
$user = User::find(1);
$user->created_at->diffForHumans(); //=> bv:  3 months ago
</code></pre>
</section>
<section>
	<h2>Om te gebruiken wel eerst namespace importeren</h2>
<pre class="fragment"><code data-trim class="PHP">
use Carbon\Carbon;
</code></pre>
</section>
<section>
		<h1><a href="#/tips-tricks">Back</a></h1>
	</section>
</section>
