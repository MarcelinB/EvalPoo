<?php

namespace App\Model;
interface CompetitionValidity
{
    public function checkEquineValidity(Equine $equine): bool;
    public function subscribeEquine(Equine $equine): self;
}