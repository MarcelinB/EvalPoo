<?php
namespace App\Model;

class Horse extends Equine implements Jump {

    public function __construct($color, $water, $rider,$name)
    {
        parent::__construct($color, $water, $rider, $name);
    }

    public function playJump()
    {
        // TODO: Implement playJump() method.
    }
}