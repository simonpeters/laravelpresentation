<section>
	<h1>Cache</h1>
	<h2>Cache item toevoegen</h2>
<pre class="fragment"><code data-trim>
Cache::put('key', 'value', $minutes);
</code></pre>
	<h2>Cache item ophalen</h2>
<pre class="fragment"><code data-trim>
$value = Cache::get('key');
</code></pre>
	<h2>Cache item verwijderen</h2>
<pre class="fragment"><code data-trim>
Cache::forget('key');
</code></pre>
	<section>
		<h1>Cache configuratie</h1>
		<h2>app/config/cache.php</h2>
		<ul>
			<li>File</li>
			<li>Database</li>
			<li>Memcached</li>
			<li>...</li>
		</ul>
		<aside class="notes">Code blijft zelfde, uniforme API voor alle cache types. Krachtig in combinatie met enviorments</aside>
	</section>
</section>