<?php

namespace App\Model;

class JumpCompetition extends Event implements CompetitionValidity{

    public function __construct(Adress $adress, string $name, int $maxCommitments, int $maxWater, array $participatingEquine)
    {
        parent::__construct($adress, $name, $maxCommitments, $maxWater, $participatingEquine);
    }


    public function checkEquineValidity(Equine $equine): bool
    {
       return false;
    }

    public function subscribeEquine(Equine $equine): self
    {
        $this->participatingEquine[] = $equine;
        return $this;
    }
}