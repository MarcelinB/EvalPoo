<?php
namespace App\Model;
class Manager extends Human {
    public function __construct($name, $adress)
    {
        parent::__construct( $name, $adress);
    }
    
}