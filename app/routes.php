<?php

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