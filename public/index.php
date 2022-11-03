<?php

use App\Model\Adress;
use App\Model\Equine;
use App\Model\Manager;
use App\Model\Rider;
use App\Model\Sheitland;
use App\Model\Stable;

require_once __DIR__ . "/../src/app.php";
$adresse = new Adress(15, 'rue de la mort', 14000, 'Paris');
$manager = new Manager('LEMANAGERBG', $adresse);
$stable1 = new Stable('LECURIE', $adresse, $manager);
$adresse2 = new Adress(15, 'rue de la vie', 14000, 'Caen');
$c1 = new Sheitland('Alzan', 20, 'BELLEBETE');
$c2 = new Sheitland('Alzan', 40, 'BGBG');
$tabHorses = [$c1, $c2];


$rider = new Rider('Joe', $adresse2, $stable1, $tabHorses);
echo $rider->__toString();