<?php
namespace App\Model;
interface ColorValidity {
    public function checkColor(string $color):bool;
}