<?php

$post = $app['controllers_factory'];

// Show Individual Post
$post->get('/{id}', function (Silex\Application $app, $id) use ($blogPosts)
{
    if (!isset($blogPosts[$id]))
    {
        $app->abort(404, "Post $id does not exist.");
    }
    
    $post = $blogPosts[$id];
    
    return $app['twig']->render('post.html.twig', [
        'post' => $post,
    ]);
});

return $post;
