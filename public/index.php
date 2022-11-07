<?php

use App\Model\Adress;
use App\Model\Equine;
use App\Model\JumpCompetition;
use App\Model\Manager;
use App\Model\Rider;
use App\Model\Sheitland;
use App\Model\Stable;

require_once __DIR__ . "/../src/app.php";
$adresse = new Adress(15, 'rue de la mort', 14000, 'Paris');
$manager = new Manager('LEMANAGERBG', $adresse);
$stable1 = new Stable('LECURIE', $adresse, $manager);
//$adresse2 = new Adress(15, 'rue de la vie', 14000, 'Caen');
try {
    $c2 = new Sheitland('Alzan', 3, 'Karl2');
}catch (Exception $e){
    echo "Erreur : {$e->getMessage()} \n";
}

$c1 = new Sheitland('Alzan', 3, 'José1');
$c3 = new Sheitland('Alzan', 3, 'Didier3');
//$tabHorses = [$c1, $c2, $c3];
////$tabHorses[] = $c3;
$adressComp = new Adress(15, 'rue de la comp', 14000, 'Lisieux');
$jComp = new JumpCompetition($adressComp, 'Ma belle compet', 4, 10);
//var_dump($jComp->checkEquineValidity($c1));
$cavalier = new Rider('Joe', $adressComp, $stable1);

try {
    $jComp->subscribeEquine([$c2, $c1, $c3]);
    //var_dump($jComp);
    //$cavalier->setMyEquine([$c2, $c2]);
} catch (Exception $e){
    echo "Error : {$e->getMessage()} \n";
}
try {
    //$jComp->subscribeEquine([$c2]);
    //var_dump($jComp);
    //$cavalier->setMyEquine([$c2, $c2, $c2, $c2,]);
} catch (Exception $e){
    echo "Error : {$e->getMessage()} \n";
}
//echo $cavalier->__toString();


