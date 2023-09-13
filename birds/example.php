<?php

require_once "Birds.php";

$ostrich = new Ostrich();
$ostrich->setGender('Male');
$ostrich->eat();
$ostrich->walk();
$ostrich->run();

$eagle = new Eagle();
$eagle->setGender('Female');
$eagle->eat();
$eagle->walk();
$eagle->fly();

 ?>
