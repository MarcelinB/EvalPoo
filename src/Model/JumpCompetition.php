<?php

namespace App\Model;

class JumpCompetition extends Event implements CompetitionValidity{
    protected array $participatingEquine = [];

    public function __construct(Adress $adress, string $name, int $maxCommitments, int $maxWater, array $participatingEquine = [])
    {
        parent::__construct($adress, $name, $maxCommitments, $maxWater);
        $this->setParticipatingEquine($participatingEquine);
    }


    public function checkEquineValidity(Equine $equine): bool
    {
       return true;
    }

    public function subscribeEquine(array $arrayEquine): self
    {
        foreach ($arrayEquine as $equine){
            if($this->checkEquineValidity($equine)){
                $this->participatingEquine[] = $equine;
                var_dump('Cheval inscrit');
                return $this;
            }
            else {
                throw new \Error('Competition already full');
            }
        }


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