<section id="eloquent">

<section>
	<h1>Eloquent</h1>
	<h3>Laravel's ORM</h3>
</section>
	
<section>
	<h2>Scoping</h2>
	<p class="fragment">Eigen 'methodes' toevoegen aan uw Eloquent Model.</p>
</section>
<section>
<pre class="fragment"><code data-trim>
class User extends Eloquent {

     public function scopeGender($query, $gender)
    {
        return $query->whereGender($gender);
    }

}
</code></pre>
<pre class="fragment"><code data-trim>
$maleUsers = User::gender('M')->get();
</code></pre>
</section> 

<section>
	<h1>Filter op relatie</h1>
	<h2 class="fragment">Alleen Posts met Comments op halen</h2>
<pre class="fragment"><code data-trim>
$posts = Post::has('comments')->get();
</code></pre>
</section>

<section>
	<h2>Nog verder filteren</h2>
<pre class="fragment"><code data-trim>
$posts = Post::whereHas('comments', function($q)
{
    $q->where('content', 'like', 'foo%');

})->get();
</code></pre>
</section>

</section>