<?php

namespace App\Model;

use Exception;

class JumpCompetition extends Event implements CompetitionValidity{
    /**
     * @var array
     */
    protected array $participatingEquine = [];

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
        if (!method_exists($equine, 'playJump')) throw new Exception("Votre catégorie d'équidé ne peut pas participer à cette compétition");
        foreach ($this->getParticipatingEquine() as $alreadyParticipating){
            if ($alreadyParticipating->getId() === $equine->getId()) throw new Exception("L'équidé {$equine->getName()} avec l'id {$equine->getId()} est déjà inscrit à la compétition");

        }
        return true;
    }

    /**
     * Check if there are enough water in the event
     * @param array $arrayEquine
     * @return bool
     * @throws Exception
     */
    public function checkWaterValidity(array $arrayEquine):bool{
        $water = 0;
        $askForWater = 0;
        foreach ($this->getParticipatingEquine() as $alreadyParticipating){
            $water += $alreadyParticipating->getWater();
        }
        foreach ($arrayEquine as $equine){
            $askForWater += $equine->getWater();
        }
        if($water + $askForWater > $this->getMaxWater()) throw new Exception("Eau insuffisante pour inscrire vos équidés");
        return true;
    }

    /**
     * Register an array of horses (can be single) for the competition
     * @param array $arrayEquine
     * @return $this
     * @throws Exception
     */
    public function subscribeEquine(array $arrayEquine): self
    {
        if (count($arrayEquine) > ($this->getMaxCommitments() - count($this->getParticipatingEquine()))) throw new Exception("Places restantes insuffisantes inscrivez moins de chevaux");
        if ($this->checkWaterValidity($arrayEquine)){
            foreach ($arrayEquine as $equine){
                if($this->checkEquineValidity($equine, $arrayEquine)){
                    $this->participatingEquine[] = $equine;
                    echo "{$equine->getName()} inscrit \n";
                }
            }
        }
        return $this;
    }

    /**
     * @return array
     */
    public function getParticipatingEquine(): array
    {
        return $this->participatingEquine;
    }

    /**
     * @param array $participatingEquine
     * @return Event
     */
    public function setParticipatingEquine(array $participatingEquine): Event
    {
        $this->participatingEquine = $participatingEquine;
        return $this;
    }
}