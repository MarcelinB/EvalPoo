<?php

use App\Model\Adress;
use App\Model\Equine;
use App\Model\Manager;
use App\Model\Rider;
use App\Model\Stable;

require_once __DIR__ . "/../src/app.php";
$adresse = new Adress(15, 'rue de la mort', 14000, 'Paris');
$manager = new Manager('LEMANAGERBG', $adresse);
$stable1 = new Stable('LECURIE', $adresse, $manager);
$adresse2 = new Adress(15, 'rue de la vie', 14000, 'Caen');
$rider = new Rider('Joe', $adresse2, $stable1);

$c1 = new Equine('Alzan', 10, $rider, 'Horse');
var_dump($stable1);