<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">

        <title>Laravel Presentatie</title>

        <meta name="description" content="A framework for easily creating beautiful presentations using HTML">
        <meta name="author" content="Hakim El Hattab">

        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <link rel="stylesheet" href="reveal/css/reveal.min.css">
        <link rel="stylesheet" href="reveal/css/theme/default.css" id="theme">
        <link rel="stylesheet" href="css/custom.css" id="theme">

        <!-- For syntax highlighting -->
        <link rel="stylesheet" href="reveal/lib/css/zenburn.css">

        <!--[if lt IE 9]>
            <script src="lib/js/html5shiv.js"></script>
        <![endif]-->
    </head>

    <body>

        <div class="reveal">

            <!-- Any section element inside of this container is displayed as a slide -->
            <div class="slides">
                <?php require_once('presentations/laravel_intro.php'); ?>
                <?php require_once('presentations/composer.php'); ?>
                <?php require_once('presentations/routing.php'); ?>
                <section>
                    <h1>Quiz: #1</h1>
                    <h3 class="fragment">Wat is verschil tussen "composer install" en "composer update"</h3>
                </section>
                <section>
                    <img src="images/it-celebrate.gif" alt="">
                </section>
                <section>
                    <h1>PAUZE</h1>
                </section>
                <?php require_once('presentations/structuur.php'); ?>
                <?php require_once('presentations/part2.php'); ?>
                <section>
                    <h1>Quiz: #2</h1>
                    <h3 class="fragment">Wat doet "__callStatic()"</h3>
                </section>
                <section>
                    <img src="images/fq1ml.gif" width='50%' alt="">
                </section>
                <section>
                    <h1>PAUZE</h1>
                </section>
                <?php require_once('presentations/tipsandtricks.php'); ?>
                
                <section>
                    <h1>Vragen?</h1>
                </section>
                <section>
                    <h1>The end!</h1>
                </section>
                <section>
                    <h2>Resources</h2>
                    <ul>
                        <li><a href="https://laracasts.com/">Laracast</a></li>
                        <li><a href="http://net.tutsplus.com/tag/laravel/">Nettuts</a></li>
                        <li><a href="http://laravel.io/">Laravel IO</a></li>
                        <li><a href="https://leanpub.com/codebright">CodeBright</a></li>
                        <li><a href="https://www.facebook.com/groups/allstardevteam/">Facebook dev groep</a></li>
                        <li><a href="http://laravel.io/irc">Laravel IRC</a></li>
                    </ul>
                </section>
                <?php require_once('presentations/tipsandtricks2.php'); ?>
                <?php require_once('presentations/cache.php'); ?>
                <?php require_once('presentations/tinker.php'); ?>
                <?php require_once('presentations/events.php'); ?>
                <?php require_once('presentations/environments.php'); ?>
                <?php require_once('presentations/carbon.php'); ?>
                <?php require_once('presentations/eloquent.php'); ?>
            </div>

        </div>

        <script src="reveal/lib/js/head.min.js"></script>
        <script src="reveal/js/reveal.min.js"></script>

        <script>

            // Full list of configuration options available here:
            // https://github.com/hakimel/reveal#configuration
            Reveal.initialize({
                controls: true,
                progress: true,
                history: true,
                center: true,

                theme: Reveal.getQueryHash().theme, // available themes are in /css/theme
                transition: Reveal.getQueryHash().transition || 'fade', // default/cube/page/concave/zoom/linear/fade/none

                // Parallax scrolling
                // parallaxBackgroundImage: 'https://s3.amazonaws.com/hakim-static/reveal-js/reveal-parallax-1.jpg',
                // parallaxBackgroundSize: '2100px 900px',

                // Optional libraries used to extend on reveal
                dependencies: [
                    { src: 'reveal/lib/js/classList.js', condition: function() { return !document.body.classList; } },
                    { src: 'reveal/plugin/markdown/marked.js', condition: function() { return !!document.querySelector( '[data-markdown]' ); } },
                    { src: 'reveal/plugin/markdown/markdown.js', condition: function() { return !!document.querySelector( '[data-markdown]' ); } },
                    { src: 'reveal/plugin/highlight/highlight.js', async: true, callback: function() { hljs.initHighlightingOnLoad(); } },
                    { src: 'reveal/plugin/zoom-js/zoom.js', async: true, condition: function() { return !!document.body.classList; } },
                    { src: 'reveal/plugin/notes/notes.js', async: true, condition: function() { return !!document.body.classList; } }
                ]
            });

        </script>

    </body>
</html>
