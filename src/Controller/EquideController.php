<?php

namespace App\Controller;


use App\Model\Horse;

use App\Model\Pony;
use App\Model\Sheitland;

use Exception;


class EquideController {
    protected array $createdEquine =[];
    /**
     * @throws Exception
     */
    public function createEquideForStory():array{
        try {
            $BadBoy = new Sheitland('Bleu', 6, 'Karl2');
        }catch (Exception $e){
            echo "Erreur : {$e->getMessage()} \n";
        }
        try {
            $sheitland1 = new Sheitland('Pie', 6, 'sheitland1');
        }catch (Exception $e){
            echo "Erreur : {$e->getMessage()} \n";
        }
        try {
            $sheitland2 = new Sheitland('White', '6', 'sheitland2');
        }catch (Exception $e){
            echo "Erreur : {$e->getMessage()} \n";
        }
        try {
            $sheitland3 = new Sheitland('Grey', 6, 'sheitland3');
        }catch (Exception $e){
            echo "Erreur : {$e->getMessage()} \n";
        }
        try {
            $sheitland4 = new Sheitland('Pie', 6, 'sheitland4');
        }catch (Exception $e){
            echo "Erreur : {$e->getMessage()} \n";
        }
        try {
            $horse1 = new Horse('White', 10, 'horse1');
        }catch (Exception $e){
            echo "Erreur : {$e->getMessage()} \n";
        }
        try {
            $horse2 = new Horse('Pie', '10', 'horse2');
        }catch (Exception $e){
            echo "Erreur : {$e->getMessage()} \n";
        }
        try {
            $horse3 = new Horse('Grey', 10, 'horse3');
        }catch (Exception $e){
            echo "Erreur : {$e->getMessage()} \n";
        }
        try {
            $horse4 = new Horse('Pie', 10, 'horse4');
        }catch (Exception $e){
            echo "Erreur : {$e->getMessage()} \n";
        }
        try {
            $pony1 = new Pony('Pie', 4, 'pony1');
        }catch (Exception $e){
            echo "Erreur : {$e->getMessage()} \n";
        }
        try {
            $pony2 = new Pony('White', '4', 'pony2');
        }catch (Exception $e){
            echo "Erreur : {$e->getMessage()} \n";
        }
        try {
            $pony3 = new Pony('White', 4, 'pony3');
        }catch (Exception $e){
            echo "Erreur : {$e->getMessage()} \n";
        }
        try {
            $pony4 = new Pony('Grey', 4, 'pony4');
        }catch (Exception $e){
            echo "Erreur : {$e->getMessage()} \n";
        }

        $this->createdEquine = [$sheitland1, $sheitland2, $sheitland3, $sheitland4, $horse1, $horse2, $horse3, $horse4, $pony1, $pony2, $pony3, $pony4];
        return $this->createdEquine;
    }
}