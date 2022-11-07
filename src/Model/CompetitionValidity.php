<?php

namespace App\Model;
interface CompetitionValidity
{
    public function checkEquineValidity(Equine $equine, array $arrayEquine): bool;
    public function subscribeEquine(array $arrayEquine): self;
    public function checkWaterValidity(array $arrayEquine):bool;
}