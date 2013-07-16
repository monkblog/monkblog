<?php

require 'vendor/autoload.php';

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

$app->register(new Silex\Provider\TwigServiceProvider(), [
    'twig.path' => __DIR__.'/views/themes/'.$theme,
]);

// Main Index
$app->get('/', function() use ($app, $site) 
{
    return $app['twig']->render('index.html.twig', [
        'site' => $site,
    ]);
});

$app->mount('/post', include 'core/Controllers/PostController.php');
$app->mount('/page', include 'core/Controllers/PageController.php');

$app->run(); 
