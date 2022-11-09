<?php

namespace App\Controller;

use App\Model\Adress;
use App\Model\CrossCompetition;
use App\Model\Equine;
use App\Model\Horse;
use App\Model\JumpCompetition;
use App\Model\Manager;
use App\Model\PoneyGameCompetition;
use App\Model\Rider;
use App\Model\Sheitland;
use App\Model\Stable;
use App\Controller\EquideController;

use App\Model\TrainingCompetition;
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
        . " -> Le premier équidé créé n'aura pas une couleur autorisée (couleur bleue), par conséquent  il ne sera  pas créé et le programme va throw une exception (donc 12 créés au final) \n \n";
        $eC = new EquideController();
        $arrayEquine = $eC->createEquideForStory();
        foreach ($arrayEquine as $equine){
            echo $equine->__toString() . "\n";
        }
        echo "Maintenant nous pouvons attribuer les équidés aux cavaliers. Pour tester attribuons 12 équidés au premier cavalier (le programme va throw une exception ), ensuite attribuons 5 équidés à nos deux cavaliers \n";
        try {
            $rider1->setMyEquine($arrayEquine);
        } catch (Exception $e){
            echo "Erreur : {$e->getMessage()} \n";
        }
        try {
            $arrayRider = [$arrayEquine[0], $arrayEquine[5], $arrayEquine[7], $arrayEquine[2], $arrayEquine[10]];
            $rider1->setMyEquine($arrayRider);
        } catch (Exception $e){
            echo "Erreur : {$e->getMessage()} \n";
        }
        try {
            $arrayRider2 = [$arrayEquine[1], $arrayEquine[6], $arrayEquine[9], $arrayEquine[3], $arrayEquine[8]];
            $rider2->setMyEquine($arrayRider2);
        } catch (Exception $e){
            echo "Erreur : {$e->getMessage()} \n";
        }
        echo $rider1->__toString();
        echo $rider2->__toString() . "\n";

        echo "Maintenant créons des 3 compétitions (pour des raisons pratiques elle auront la même adresse) \n" ;
        $jumpComp = new JumpCompetition($adresse3, 'JumpCompetition', 8, 22);
        $poneyGameComp = new PoneyGameCompetition($adresse3, 'PonyGameCompetition', 3, 16);
        $crossComeptition = new CrossCompetition($adresse3, 'CrossCompetition', 5, 22);
        $trainingCompetition = new TrainingCompetition($adresse3, 'TrainingCompetition', 10, 22);

        echo $jumpComp->__toString() . "\n";
        echo $poneyGameComp->__toString() . "\n";
        echo $crossComeptition->__toString() . "\n";
        echo $trainingCompetition->__toString() . "\n";

        echo "\n Maintenant créons des managers à nos écuries pour que celle-ci puissent inscrire les chevaux et leurs cavaliers à ces compétitions (ils habiterons également dans l'écurie) \n";
        $manager1 = new Manager('Benjamin LeManager1', $adresse1, $stable1);
        $manager2 = new Manager('Ricardo LeManager2', $adresse2, $stable2);
        echo $manager1->__toString() . "\n";
        echo $manager2->__toString() . "\n";

        echo "\n Demandons à B. Lemanager 1 d'inscrire un cavalier qui n'est pas de son écurie \n";
        try {
            $equiInscription = [$arrayEquine[0], $arrayEquine[2]];
            $manager1->registerRiderToCompetion($rider2, $jumpComp, $equiInscription);
        } catch (Exception $e){
            echo "Erreur : {$e->getMessage()} \n";
        }

        echo "\n Demandons lui maintenant d'inscrire un cavalier de son écurie, mais en lui demandant d'inscrire un de ces poney à un concours de saut\n";
        try {
            $equiInscription = [$arrayEquine[10]];
            $manager1->registerRiderToCompetion($rider1, $jumpComp, $equiInscription);
        } catch (Exception $e){
            echo "Erreur : {$e->getMessage()} \n";
        }
    }
}