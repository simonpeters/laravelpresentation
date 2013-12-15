<section>
    <h1>Tips 'n Tricks</h1>
    <table>
        <caption>Choose your own adventure!</caption>
        <colgroup><col style="width: 33%"><col style="width: 34%"><col style="width: 33%"></colgroup><thead>
        <tr class="header">
            <th style="text-align: left;"><a href="#/12">Carbon</a> <br><small>Fun with dates</small></th>
            <th style="text-align: left;"><a href="#/12">Tail</a> <br><small>Remote error logging</small></th>
            <th style="text-align: left;"><a href="#/12">Accessors & Mutators</a> <br><small>Chernobylize your model data</small></th>
        </tr>
        </thead>
        <tbody>
        <tr class="odd">
            <th style="text-align: left;"><a href="#/12">Boris</a> <br><small>Commandline tinkering</small></th>
            <th style="text-align: left;"><a href="#/12">Seeds & Fakers</a> <br><small>Filling up those tables</small></th>
            <th style="text-align: left;"><a href="#/12">Events</a> <br><small>Fiddeling with events</small></th>
        </tr>
        <tr class="even">
            <th style="text-align: left;"><a href="#/12">Caching</a> <br><small>Remembering stuff</small></th>
            <th style="text-align: left;"><a href="#/12">Commands</a> <br><small>Mastering artisan commands</small></th>
            <th style="text-align: left;"><a href="#/12">Environments</a> <br><small>Config all the things!</small></th>
        </tr>
        </tbody>
    </table>
</section>

<section>
    <section><h1>Accessors & Mutators</h1></section>
    <section>
        <ul>
            <li>Accessors: Attributes aanpassen bij get</li>
            <li>Mutators: Attributes aanpassen bij save</li>
        </ul>
    </section>
    <section>
        <h2>Voorbeelden van Accessors</h2>
            <p>Capitalize naam</p>
          <pre ><code  data-trim>
                 In database: first_name = "vincent"
              </code></pre>
           <pre class="fragment"><code data-trim>
class User extends Eloquent {

    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    }

}
           </code></pre>
          <pre class="fragment"><code data-trim>
              $user = User::first();

echo $user->first_name; // Output: "Vincent"
          </code></pre>
    </section>
    <section>
        <h2>Voorbeelden van Accessors</h2>
            <p>Timestap to readable date</p>
<pre ><code  data-trim>
  In database: published_at = '2013-12-16 14:53:27'
</code></pre>

           <pre class="fragment"><code data-trim>
class Post extends Eloquent {

    public function getPublishedAtAttribute($value)
    {
          return date('d/m/Y', strtotime($value));
    }

}
           </code></pre>
          <pre class="fragment"><code data-trim>
$post = Post::first();

echo $post->published_at; // Output: "16/12/2013"
          </code></pre>
    </section>
    <section>
        <h2>Voorbeelden van Accessors</h2>
        <p>Combineer velden</p>
          <pre ><code  data-trim>
                  In database: first_name = "Vincent", last_name = "Peters"
              </code></pre>
           <pre class="fragment"><code data-trim>
class User extends Eloquent {

    public function getNameAttribute()
    {
        return $this->first_name . " ". $this->last_name;
    }

}
               </code></pre>
          <pre class="fragment"><code data-trim>
$user = User::first();

echo $user->name; // Output: "Vincent Peters"
              </code></pre>
    </section>

    <section>
        <h2>Voorbeelden van Mutators</h2>
        <p>Dates omzetten naar timestamp</p>
         <pre ><code  data-trim>
                 Input field: "16/12/2013"
             </code></pre>
            <pre class="fragment"><code data-trim>
class Post extends Eloquent {

    public function setPublishedAtAttribute($value)
    {
        $this->attributes['published_at'] =
           Carbon::createFromFormat('d/m/Y', $value)->timestamp ;
    }

}
            </code></pre>
            <pre class="fragment"><code data-trim>
                    In database: "1387152000"
            </code></pre>
    </section>

    <section>
        <h2>Voorbeelden van Mutators</h2>
        <p>Omzetten naar slug</p>
         <pre ><code  data-trim>
                 Input field: "Nulla eiusmod 8-bit assumenda"
             </code></pre>
            <pre class="fragment"><code data-trim>
class Post extends Eloquent {

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Tools::slugify($value);
    }

}
                </code></pre>
            <pre class="fragment"><code data-trim>
                    In database: "nulla-eiusmod-8-bit-assumenda"
                </code></pre>
    </section>
</section>