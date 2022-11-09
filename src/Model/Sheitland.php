<?php
namespace App\Model;

class Sheitland extends Equine implements Jump, Training, Cross {

    public function __construct($color, $water,$name)
    {
        parent::__construct($color, $water, $name);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return "Race : Sheitland, Nom : {$this->getName()}, ID : {$this->getId()}, Couleur : {$this->getColor()}";
    }

    /** The horse is juming */
    public function playJump()
    {
        echo "Youhou i'm jumping like an unicorn";
    }

    /** The horse is playing cross */
    public function playCross()
    {
        echo "Youhou i'm playing cross";
    }

    /** The horse is playing training */
    public function training()
    {
        echo "Youhou i'm playing training (like a boss)";
    }
}