<?php

require 'vendor/autoload.php';
require 'core/Site.php';

$app = new Silex\Application(); 
$app['debug'] = true;

$settings = json_decode(file_get_contents('config/site.json'), true);
if (empty($settings))
{
    die('Unable to do ANYTHING useful.');
}

$siteTitle = $settings['SiteTitle'];
$theme = $settings['Theme'];

$site = new Site($siteTitle);

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views/themes/'.$theme,
));

// Main Index
$app->get('/', function() use ($app, $site) {
    return $app['twig']->render('index.html.twig', array(
        'site' => $site,
    ));
});

// Show Individual Post
$app->get('/post/{id}', function (Silex\Application $app, $id) use ($blogPosts) {
    if (!isset($blogPosts[$id])) {
        $app->abort(404, "Post $id does not exist.");
    }

    $post = $blogPosts[$id];

    return $app['twig']->render('post.html.twig', array(
        'post' => $post,
    ));
});

$app->run(); 