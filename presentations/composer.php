<section>
    <h1>Composer</h1>
    <h3>PHP package manager</h3>
</section>

<section>
    <h2>Wat is composer</h2>
    <ul>
        <li class="fragment">Dependancy manager voor PHP</li>
        <li class="fragment">Auto Loading</li>
        <li class="fragment">Project scaffolding</li>
    </ul>
</section>


<section>
    <h2>Composer is niet</h2>
    <ul>
        <li class="fragment">Framework gebonden</li>
        <li class="fragment">Dependancy manager voor Front-end of JS</li>
    </ul>
</section>

<section>
    <h1>Let's start</h1>
    <p class="fragment">Eerst instaleren, D'oh <br>Easy -> <a href="http://getcomposer.org/">getcomposer.org</a></p>
    <h2 class="fragment">Maar dan</h2>
    <pre class="fragment"><code data-trim>
        $ composer init
    </code></pre>

</section>

<section>
    <pre class="stretch"><code  data-trim>
$ composer init

Welcome to the Composer config generator

This command will guide you through creating your composer.json config.

Package name (\< vendor>/< name>) [Vinnie/presentations]: vinnie/presentaties
Description []: Composer presentaties
Author [Captain Mustacho < vincent@cloudmonkeys.be>]:
Minimum Stability []: stable
License []: MIT

Define your dependencies.

Would you like to define your dependencies (require) interactively [yes]? n

Would you like to define your dev dependencies (require-dev) interactively [yes]? n

// Voorbeeld van composer.json

Do you confirm generation [yes]? y
        </code></pre>
</section>

<section>
    <h1>Composer.json</h1>
    <p>Config bestand in JSON formaat</p>
    <pre class="fragment"><code  data-trim>
{
    "name": "vinnie/presentaties",
    "description": "Composer presentaties",
    "license": "MIT",
    "authors": [
        {
            "name": "Captain Mustacho",
            "email": "vincent@cloudmonkeys.be"
        }
    ],
    "minimum-stability": "stable"
}
    </code></pre>
</section>

<section>
    <h2>Hoe dependencies toevoegen?</h2>
    <pre class="fragment"><code  data-trim>
{
    "require": {
        "vendor/package": "version"
    }
}
    </code></pre>
    <pre class="fragment"><code  data-trim>
 {
     "require": {
        "laravel/framework": "~4.0"
     }
 }
     </code></pre>
</section>

<section>
    <h2>Dependencies alleen voor development</h2>
    <pre class="fragment"><code  data-trim>
{
    "require-dev": {
        "vendor/package": "version"
    }
}
    </code></pre>
    <pre class="fragment"><code  data-trim>
 {
     "require-dev": {
         "phpunit/phpunit": "3.7.*",
         "codeception/codeception": "1.6.*@dev"
     }
 }
    </code></pre>
</section>

<section>
    <h2>Waar packages vinden?</h2>
    <p>Package list te vinden op <a href="https://packagist.org/">packagist.org</a></p>
    <img class="fragment" src="img/packagist.PNG" alt=""/>
</section>


<section>
    <h2>Welke versies</h2>
    <p>Hoe kunnen we specifieren welke versie van de package nodig is?</p>
    <table class="fragment">
        <tr>
            <td>Exact version</td>
            <td>1.0.2</td>
        </tr>
        <tr>
            <td>Wildcard</td>
            <td>1.0.*</td>
        </tr>
        <tr>
            <td>Tilde Operator</td>
            <td>~1.2</td>
        </tr>
        <tr>
            <td>Range</td>
            <td>>= 1.0 , < 1.1 | > = 1.2</td>
        </tr>
    </table>
</section>

<section>
    <h2>Hoe ziet een volledig composer.json bestand er dan uit?</h2>
</section>

<section>
     <pre class="stretch"><code  data-trim>{
 "name": "Mychannls",
 "description": "A new way of watching television",
 "repositories": [
     {
         "type": "composer",
         "url": "http://packages.cartalyst.com"
     }
 ],
 "require": {
     "laravel/framework": "4.0.*",
     "cartalyst/sentry": "2.0.*",
     "predictionio/predictionio": "*",
     "pda/pheanstalk": "dev-master",
     "iron-io/iron_mq": "dev-master",
     "cartalyst/sentry": "2.0.*",
     "roumen/sitemap": "dev-master",
     "cartalyst/sentry-social": "2.0.*",
     "facebook/php-sdk": "3.2.*"
 },
 "require-dev": {
     "mockery/mockery": "dev-master@dev",
     "phpunit/phpunit": "3.7.*",
     "codeception/codeception": "1.6.*@dev",
     "raveren/kint": "dev-master"
 },
 "autoload": {
     "classmap": [
         "app/commands",
         "app/controllers",
         "app/controllers/api",
         "app/controllers/web",
         "app/models",
         "app/libraries/recommendations",
         "app/libraries/postman",
         "app/libraries/tools",
         "app/libraries/lifeInvader",
         "app/libraries/videotools",
         "app/database/migrations",
         "app/database/seeds",
         "app/tests/TestCase.php"
     ]
 },
 "scripts": {
     "post-install-cmd": [
        "php artisan optimize"
     ],
     "pre-update-cmd": [
        "php artisan clear-compiled"
     ],
     "post-update-cmd": [
        "php artisan optimize"
     ],
     "post-create-project-cmd": [
        "php artisan key:generate"
     ]
 },
 "config": {
    "preferred-install": "dist"
 },
 "minimum-stability": "dev"
 }
         </code>
    </pre>
</section>

<section>
    <h1>Install command</h1>
    <p>Composer.json gereed?</p>
    <pre class="fragment"><code  data-trim>
        $ composer install
    </code></pre>
    <img class="fragment" src="img/composerinstall.PNG" alt=""/>
</section>





<section>
    <h1>composer.lock</h1>
    <p>locked install package versies</p>
    <ul class="fragment">
        <li>Elke developer de zelfde versie</li>
        <li>Juiste versies op de server</li>
    </ul>
</section>

<section>
    <h2>Don't open?!</h2>
    <img src="img/lock.PNG" alt=""/>
</section>



<section>
    <h2>Install Vs. Update</h2>
    <div class="fragment">
        <h3>Install</h3>
        <p>Geen composer.lock? Installeer hoogste versies volgens package.json</p>
        <p>Wel een composer.json! Installeer de versies volgens lock file</p>

    </div>
    <div class="fragment">
        <h3>Update</h3>
        <p>Installeer altijd de hoogste versie mogelijk volgens het config file</p>
        <p>En maak nieuw composer.lock aan</p>
    </div>

</section>


<section>
    <h1>Update command</h1>
    <pre class="fragment"><code  data-trim>
        $ composer update
    </code></pre>
    <img class="fragment" src="img/composerupdate.PNG" alt=""/>
</section>

</section>

<section>
    <h1>Project scaffolding</h1>
    <p>Snel een laravel project opstarten?</p>
    <pre class="fragment"><code  data-trim>
        composer create-project laravel/laravel --prefer-dist
    </code></pre>
    <pre class="fragment"><code  data-trim>
$ composer create-project laravel/laravel --prefer-dist
Installing laravel/laravel (v4.0.9)
- Installing laravel/laravel (v4.0.9)
Downloading: 100%

Created project in C:\xampp\htdocs\presentations\composer\laravel
Loading composer repositories with package information
Installing dependencies (including require-dev)

// Instaleren van alle dependencies

    </code></pre>
</section>

<section>
    <img src="img/laravelfolders.PNG" alt=""/>
</section>

<section>
    <h1>Autoloading</h1>
    <div class="fragment">
        <h3>Vroeger:</h3>
        <p>Elk bestand waar we librarie nodig hebben</p>
        <pre class="fragment"><code  data-trim>
require_once("libs/facebook.php");

$config = array(
    //config settings
);

$facebook = new Facebook($config);
        </code></pre>
    </div>
</section>

<section>
    <h3>Met composer:</h3>
    <pre class="fragment"><code  data-trim>
{
    "require": {
        "facebook/php-sdk" : "~3.2"
    }
}
    </code></pre>
    <pre class="fragment"><code  data-trim>
        $ composer install
    </code></pre>
    <pre class="fragment"><code  data-trim>
$config = array(
    //config settings
);

$facebook = new Facebook($config);
    </code></pre>
</section>