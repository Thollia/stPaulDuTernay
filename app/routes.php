<?php

$app->get('/', function(){
   require '../src/model.php';
   $sejours = getSejour();

   ob_start();
   require '../views/view.php';
   $view = ob_get_clean();
   return $view;
});