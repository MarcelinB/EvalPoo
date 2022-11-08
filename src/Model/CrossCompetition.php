<?php

namespace App\Model;

use Exception;

class CrossCompetition extends Event {


    public function __construct(Adress $adress, string $name, int $maxCommitments, int $maxWater, array $participatingEquine = [])
    {
        parent::__construct($adress, $name, $maxCommitments, $maxWater);
        $this->setParticipatingEquine($participatingEquine);
    }

    /**
     * Check if the horse can register for the event
     * @param Equine $equine
     * @param array $arrayEquine
     * @return bool
     * @throws Exception
     */
    public function checkEquineValidity(Equine $equine, array $arrayEquine): bool
    {
        if(count($arrayEquine) > $this->getMaxCommitments()) throw new Exception("Vous ne pouvez pas inscrire plus de chevaux qu'il n'y a de places");
        if(count($this->getParticipatingEquine())>=$this->getMaxCommitments()) throw new Exception('Compétition déjà complète');
        if (!method_exists($equine, 'playCross')) throw new Exception("Votre catégorie d'équidé ne peut pas participer à cette compétition");
        foreach ($this->getParticipatingEquine() as $alreadyParticipating){
            if ($alreadyParticipating->getId() === $equine->getId()) throw new Exception("L'équidé {$equine->getName()} avec l'id {$equine->getId()} est déjà inscrit à la compétition");

        }
        return true;
    }

}