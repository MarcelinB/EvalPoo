<?php
namespace App\Model;

class Sheitland extends Equine implements Jump, Training, Cross {

    public function __construct($color, $water,$name)
    {
        parent::__construct($color, $water, $name);
    }
    public function __toString(){
        return "nom : {$this->getName()}, categorie : Sheiltland, couleur : {$this->getColor()} \n";
    }

    public function playJump()
    {
        // TODO: Implement playJump() method.
    }

    public function playCross()
    {
        // TODO: Implement playCross() method.
    }

    public function Training()
    {
        // TODO: Implement Training() method.
    }
}