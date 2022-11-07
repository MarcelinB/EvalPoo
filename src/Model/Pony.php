<?php
namespace App\Model;

class Pony extends Equine implements PoneyGame, Training {

    public function __construct($color, $water, $rider,$name)
    {
        parent::__construct($color, $water, $rider, $name);
    }


    public function playPoneyGame()
    {
        // TODO: Implement playPoneyGame() method.
    }

    public function Training()
    {
        // TODO: Implement Training() method.
    }
}