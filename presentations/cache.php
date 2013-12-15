<section>
<section>
<h1>Cache</h1>
	<h2>Cache item toevoegen</h2>
<pre class="fragment"><code data-trim>
Cache::put('laravelPresentation', true, 60);
</code></pre>
	<h2>Cache item ophalen</h2>
<pre class="fragment"><code data-trim>
$value = Cache::get('laravelPresentation');
</code></pre>
	<h2>Cache item verwijderen</h2>
<pre class="fragment"><code data-trim>
Cache::forget('laravelPresentation');
</code></pre>
</section>
<section>
		<h1>Cache configuratie</h1>
		<h2>app/config/cache.php</h2>
		<ul>
			<li class="fragment">File</li>
			<li class="fragment">Database</li>
			<li class="fragment">Memcached</li>
			<li class="fragment">...</li>
		</ul>
		<aside class="notes">Code blijft zelfde, uniforme API voor alle cache types. Krachtig in combinatie met enviorments</aside>
	</section>
</section>