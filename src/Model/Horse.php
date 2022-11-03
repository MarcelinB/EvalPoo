<?php
namespace App\Model;

class Horse extends Equine implements Jump, Training, Cross {

    public function __construct($color, $water, $rider,$name)
    {
        parent::__construct($color, $water, $rider, $name);
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