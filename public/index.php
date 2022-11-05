<?php

use App\Model\Adress;
use App\Model\Equine;
use App\Model\JumpCompetition;
use App\Model\Manager;
use App\Model\Rider;
use App\Model\Sheitland;
use App\Model\Stable;

require_once __DIR__ . "/../src/app.php";
//$adresse = new Adress(15, 'rue de la mort', 14000, 'Paris');
//$manager = new Manager('LEMANAGERBG', $adresse);
//$stable1 = new Stable('LECURIE', $adresse, $manager);
//$adresse2 = new Adress(15, 'rue de la vie', 14000, 'Caen');
$c1 = new Sheitland('Alzan', 20, 'BELLEBETE');
//$c2 = new Sheitland('Pie', 40, 'BGBG');
//$tabHorses = [$c1, $c2];
//$c3 = new Sheitland('OUAIS', 40, 'OUAIS');
//$tabHorses[] = $c3;
$adressComp = new Adress(15, 'rue de la comp', 14000, 'Lisieux');
$jComp = new JumpCompetition($adressComp, 'Ma belle compet', 10, 10);
//var_dump($jComp->checkEquineValidity($c1));
try {
    $jComp->subscribeEquine([$c1]);
    //var_dump($jComp);
} catch (Error $e){
    echo $e->getMessage();
}


//$rider = new Rider('Joe', $adresse2, $stable1, $tabHorses);
//echo $rider->__toString();