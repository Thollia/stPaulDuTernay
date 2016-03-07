<?php

$app->get('/', function() use ($app) {
    $sejours = $app['dao.sejour']->findAll();

   ob_start();
   require '../views/view.php';
   $view = ob_get_clean();
   return $view;
});