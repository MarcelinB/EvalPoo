<?php

namespace App\Controller;

use App\Model\Adress;
use Error;

class AdressController {
    /**
     * create some adress for story
     * @return array
     */
    public function createAdressForStory():array {
        $tAdress = [];
        try {
            $adresse1 = new Adress(1, 'Rue du paradis', 14000, 'Caen');
            $tAdress[] = $adresse1;
        } catch (Error $e){
            echo "Erreur : {$e->getMessage()} \n";
        }
        try {
            $adresse2 = new Adress(99, 'Rue de la vie', 77000, 'Coulommiers');
            $tAdress[] = $adresse2;
        } catch (Error $e){
            echo "Erreur : {$e->getMessage()} \n";
        }
        try {
            $adresse3 = new Adress(753, 'Rue de la mort', 29200, 'Brest');
            $tAdress[] = $adresse3;
        } catch (Error $e){
            echo "Erreur : {$e->getMessage()} \n";
        }
        try {
            echo $adresse1->__toString() . "\n";
        } catch (Error $e){
            echo "Erreur : {$e->getMessage()} \n";
        }
        try {
            echo $adresse2->__toString() . "\n";
        } catch (Error $e){
            echo "Erreur : {$e->getMessage()} \n";
        }
        try {
            echo $adresse3->__toString() . "\n \n";
        } catch (Error $e){
            echo "Erreur : {$e->getMessage()} \n";
        }
        return $tAdress;
    }
}