<?php

namespace App\Controller;

use App\Model\Adress;
use App\Model\Equine;
use App\Model\Horse;
use App\Model\JumpCompetition;
use App\Model\Manager;
use App\Model\Rider;
use App\Model\Sheitland;
use App\Model\Stable;
use App\Controller\EquideController;

use Exception;


class StoryController {
    /**
     * @throws Exception
     */
    public function aGoodStoryForVincentBray():void{
        echo "Bonjour, ceci est le test (en français) pour controller le programme : (j'utiliserai la méthode __toString() des objets pour montrer leurs créations)\n \n";
        echo "-> Commençons par créer 3 objets 'Adress' différents : \n";
        $adresse1 = new Adress(01, 'Rue du paradis', 14000, 'Caen');
        $adresse2 = new Adress(99, 'Rue de la vie', 77000, 'Coulommiers');
        $adresse3 = new Adress(753, 'Rue de la mort', 29200, 'Brest');
        echo $adresse1->__toString() . "\n";
        echo $adresse2->__toString() .  "\n";
        echo $adresse3->__toString() . "\n \n";
        echo "-> Créons maintenant 2 écuries (notons que les écuries peuvent être créées sans managers) \n";
        $stable1 = new Stable("Ho mon beau cheval", $adresse1);
        $stable2 = new Stable("What a big Ranch", $adresse2);
        echo $stable1->__toString(). "\n";
        echo $stable2->__toString(). "\n \n";
        echo "-> Créons maintenant 2 cavaliers, un pour chaque écurie (pour des raisons pratiques, les cavaliers habiterons dans l'écurie pour ce test) \n";
        $rider1 = new Rider('Henry', $adresse1, $stable1);
        $rider2 = new Rider('Jean-Paul', $adresse2, $stable2);
        echo $rider1->__toString();
        echo $rider2->__toString() . "\n";
        echo "Notons que pour l'instant nos cavaliers n'ont pas d'équidés en leurs possession, quelle hérésie ! Remédions à cela et créons 13 équidés de races différentes et de couleur différentes. \n"
        . " -> Le premier équidé créé n'aura pas une couleur autorisée (couleur bleue) et qu'il sera par conséquent pas créé et le programme va throw une exception (donc 12 créés au final) \n \n";
        $eC = new EquideController();
        $arrayEquine = $eC->createEquideForStory();
        foreach ($arrayEquine as $equine){
            echo $equine->__toString() . "\n";
        }
    }
}