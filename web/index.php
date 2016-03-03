<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

require __DIR__.'/../app/routes.php';

$app->run();


/*$bdd = new PDO('mysql:host=localhost;dbname=bdstpaul;charset=utf8', 'root');

include_once "model.php";
$sejours = getSejour($bdd);
include_once "view.php";*/
?>
