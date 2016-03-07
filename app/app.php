<?php

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;

ErrorHandler::register();
ExceptionHandler::register();

$app->register(new Silex\Provider\DoctrineServiceProvider());

$app['dao.sejour'] = $app->share(function ($app) {
    return new stpaul\DAO\SejourDAO($app['db']);
});