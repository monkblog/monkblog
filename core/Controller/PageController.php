<?php

$page = $app['controllers_factory'];

// Show Individual Post
$page->get('/{id}', function (Silex\Application $app, $id) use ($blogPages)
{
    if (!isset($blogPages[$id]))
    {
        $app->abort(404, "Post $id does not exist.");
    }
    
    $page = $blogPages[$id];
    
    return $app['twig']->render('page.html.twig', [
        'page' => $page,
    ]);
});

return $page;
