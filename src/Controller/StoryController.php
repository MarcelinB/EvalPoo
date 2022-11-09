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
use App\Controller\AdressController;


use App\Model\TrainingCompetition;
use Error;
use Exception;


class StoryController {
    /**
     * @throws Exception
     * @throws Error
     */
    public function aGoodStoryForVincentBray():void{
        echo "Bonjour, ceci est le test (en français) pour controller le programme : (j'utiliserai la méthode __toString() des objets pour montrer leurs créations)\n \n";
        echo "-> Commençons par créer 3 objets 'Adress' différents : \n";
        $adressController = new AdressController();
        $tAdress = $adressController->createAdressForStory();
        echo "-> Créons maintenant 2 écuries (notons que les écuries peuvent être créées sans managers) \n";
        $stable1 = new Stable("Ho mon beau cheval", $tAdress[0]);
        $stable2 = new Stable("What a big Ranch", $tAdress[1]);
        echo $stable1->__toString(). "\n";
        echo $stable2->__toString(). "\n \n";
        echo "-> Créons maintenant 2 cavaliers, un pour chaque écurie (pour des raisons pratiques, les cavaliers habiterons dans l'écurie pour ce test) \n";
        $rider1 = new Rider('Henry', $tAdress[0], $stable1);
        $rider2 = new Rider('Jean-Paul', $tAdress[1], $stable2);
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
        $jumpComp = new JumpCompetition($tAdress[2], 'JumpCompetition', 8, 100);
        $poneyGameComp = new PoneyGameCompetition($tAdress[2], 'PonyGameCompetition', 3, 16);
        $crossComeptition = new CrossCompetition($tAdress[2], 'CrossCompetition', 5, 100);
        $trainingCompetition = new TrainingCompetition($tAdress[2], 'TrainingCompetition', 10, 8);

        echo $jumpComp->__toString() . "\n";
        echo $poneyGameComp->__toString() . "\n";
        echo $crossComeptition->__toString() . "\n";
        echo $trainingCompetition->__toString() . "\n";

        echo "\n Maintenant créons des managers à nos écuries pour que celle-ci puissent inscrire les chevaux et leurs cavaliers à ces compétitions (ils habiterons également dans l'écurie) \n";
        $manager1 = new Manager('Benjamin LeManager1', $tAdress[0], $stable1);
        $manager2 = new Manager('Ricardo LeManager2', $tAdress[1], $stable2);
        echo $manager1->__toString() . "\n";
        echo $manager2->__toString() . "\n";

        echo "\n Demandons à B. Lemanager 1 d'inscrire un cavalier qui n'est pas de son écurie \n";
        try {
            $equiInscription = [$arrayEquine[0], $arrayEquine[2]];
            $manager1->registerRiderToCompetion($rider2, $jumpComp, $equiInscription);
        } catch (Exception $e){
            echo "Erreur : {$e->getMessage()} \n";
        }

        echo "\n Demandons lui maintenant d'inscrire un cavalier de son écurie, mais en lui demandant d'inscrire un de ces poney à un concours de saut (ce qui n'est pas possible)\n";
        try {
            $equiInscription = [$arrayEquine[10]];
            $manager1->registerRiderToCompetion($rider1, $jumpComp, $equiInscription);
        } catch (Exception $e){
            echo "Erreur : {$e->getMessage()} \n";
        }
        echo "\n Demandons lui maintenant d'inscrire 3 équidés à une compétition qui n'a pas une quantité d'eau suffisante \n";
        try {
            $equiInscription = [$arrayEquine[0], $arrayEquine[5], $arrayEquine[7]];
            $manager1->registerRiderToCompetion($rider1, $trainingCompetition, $equiInscription);
        } catch (Exception $e){
            echo "Erreur : {$e->getMessage()} \n";
        }
        echo "\n Maitenant, laissons inscrire le manager1 trois bons équidés et ensuite demandons au manager2 d'en inscrire 3 autres, dans une compétition à 5 places maximum \n";
        try {
            $equiInscription = [$arrayEquine[0], $arrayEquine[5], $arrayEquine[7]];
            $manager1->registerRiderToCompetion($rider1, $crossComeptition, $equiInscription);
        } catch (Exception $e){
            echo "Erreur : {$e->getMessage()} \n";
        }
        try {
            $equiInscription = [$arrayEquine[1], $arrayEquine[3], $arrayEquine[6]];
            $manager2->registerRiderToCompetion($rider2, $crossComeptition, $equiInscription);
        } catch (Exception $e){
            echo "Erreur : {$e->getMessage()} \n";
        }
        echo "\n Le manager2 ne va finalement inscrire qu'un seul cheval pour être dans le rêgle, et ensuite nous allons demander au manager1 de réinscrire un équidé qu'il a deja inscrit \n";
        try {
            $equiInscription = [$arrayEquine[1],];
            $manager2->registerRiderToCompetion($rider2, $crossComeptition, $equiInscription);
        } catch (Exception $e){
            echo "Erreur : {$e->getMessage()} \n";
        }
        try {
            $equiInscription = [$arrayEquine[0]];
            $manager1->registerRiderToCompetion($rider1, $crossComeptition, $equiInscription);
        } catch (Exception $e){
            echo "Erreur : {$e->getMessage()} \n";
        }
    }
}