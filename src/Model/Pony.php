<?php
namespace App\Model;

class Pony extends Equine implements PoneyGame, Training {

    public function __construct($color, $water,$name)
    {
        parent::__construct($color, $water, $name);
    }

    /** The horse is playing poneyGame */
    public function playPoneyGame()
    {
        echo "Youhou i'm playing poney game that's so cute";
    }

    /** The horse is playing training */
    public function training()
    {
        echo "Youhou i'm playing training (like a boss)";
    }
}