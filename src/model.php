<?php

function getDB(){
    return new PDO('mysql:host=localhost;dbname=bdstpaul;charset=utf8', 'root');
}

function getSejour()
{
    return getDB()->query('select * from sejour order by sejno');

}

?>
