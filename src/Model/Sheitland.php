<?php
namespace App\Model;

class Sheitland extends Equine implements Jump {

    public function __construct($color, $water,$name)
    {
        parent::__construct($color, $water, $name);
    }
    public function __toString(){
        return "category : Sheiltland  nom : {$this->getName()}, couleur : {$this->getColor()} ";
    }

    public function playJump()
    {
        // TODO: Implement playJump() method.
    }
}