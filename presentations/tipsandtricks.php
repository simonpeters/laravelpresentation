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

<section>
    <section>
        <h1>Seeds & Fakers</h1>
    </section>

    <section>
        <h2>Seeds</h2>
        <p>Database vullen met data via de command line</p>
        <p>Handig voor development in team</p>
    </section>

    <section>
        <h2>Voorbeelden van Seeding</h2>
        <p>Dummy gebruikers toevoegen</p>
            <pre class=""><code data-trim>
class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(array('email' => 'foo@bar.com',
            'name' => "John doe" ));

        User::create(array('email' => 'lorem@ipsum.com',
            'name' => "Jane doe" ));
    }

}
                </code></pre>
        <div class="fragment">
        <p>Command line:</p>
            <pre class=""><code data-trim>
                   $ php artisan db:seed
                </code></pre></div>
    </section>

    <section>
        <h2>Combineren met Faker</h2>
        <div class="fragment">
            <p>Zit niet standaard in Laravel.</p>
            <p>Genereert dummy data dynamisch</p>
        </div>
    </section>

    <section>
        <h3>Faker installeren</h3>
        <p>Install via composer</p>
         <pre class="fragment"><code data-trim>
 "require-dev": {
     "mockery/mockery": "dev-master@dev",
     "phpunit/phpunit": "3.7.*",
     "fzaninotto/faker": dev-master"
 },
             </code></pre>
    </section>

    <section>
        <pre class=""><code data-trim>
class UserTableSeeder extends Seeder {

    public function run()
    {
        Elequent::unguard();

        $faker = Faker\Factory::create();

        foreach( range(1,20) as $index)
        {
            User::create([
                'email'     => $faker->email,
                'usernam'  => $faker->userName
                ]);
        }
    }

}
            </code></pre>
    </section>
    
    <section>
        <h2>Outputs:</h2>
        <img src="images/faker.PNG" alt=""/>
    </section>

    <section>
        <h2>Andere voorbeelden</h2>
       <pre class="fragment"><code data-trim>$faker->name           // 'Dr. Zane Stroman'</code></pre>
       <pre class="fragment"><code data-trim>$faker->address        // '8888 Cummings Vista Apt. 101, Susanbury, NY 954'</code></pre>
       <pre class="fragment"><code data-trim>$faker->country                 // 'Falkland Islands (Malvinas)'</code></pre>
       <pre class="fragment"><code data-trim>$faker->phoneNumber             // '132-149-0269x3767'</code></pre>
       <pre class="fragment"><code data-trim>$faker->word                    // 'aut'</code></pre>
       <pre class="fragment"><code data-trim>$faker->sentence(6)  // 'Sit vitae voluptas sint non voluptates.'</code></pre>
       <pre class="fragment"><code data-trim>$faker->paragraph(3) // 'Ut ab voluptas sed a nam. Sint aut ...'</code></pre>
       <pre class="fragment"><code data-trim>$faker->url                     // 'http://www.strackeframi.com/'</code></pre>
       <pre class="fragment"><code data-trim>$faker->dateTimeThisMonth       // DateTime('2011-10-23 13:46:23')'</code></pre>
       <pre class="fragment"><code data-trim>$faker->hexcolor               // '#fa3cc2'</code></pre>
       <pre class="fragment"><code data-trim>$faker->imageUrl               // 'http://lorempixel.com/640/480/'</code></pre>
    </section>
</section>

<section>
    <section>
        <h1>Laravel tail</h1>
    </section>
</section>