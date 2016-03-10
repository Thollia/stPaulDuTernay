<?php

use Symfony\Component\HttpFoundation\Request;

$app->get('/', function() use ($app) {
    $sejours = $app['dao.sejour']->findAll();
    return $app['twig']->render('index.html.twig', array('sejours' => $sejours));

});

$app->get('/index', function() use ($app) {
    $sejours = $app['dao.sejour']->findAll();
    return $app['twig']->render('index.html.twig', array('sejours' => $sejours));

});

$app->get('/contact', function() use ($app){
    return $app['twig']->render('contact.html.twig');
});

$app->get('/login', function(Request $request) use ($app) {
    return $app['twig']->render('login.html.twig', array(
        'error'         => $app['security.last_error']($request),
        'last_username' => $app['session']->get('_security.last_username'),
    ));
})->bind('login');

$app->get('/facturation', function() use ($app) {
    return "Facturation";
});