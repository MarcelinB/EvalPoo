<?php
namespace App\Model;

use App\Model\Stable;
use App\Model\Equine;
use Exception;

class Rider extends Human {
    protected Stable $stable;
    protected array $myEquine = [];

    /**
     * @throws Exception
     */
    public function __construct($name, $adress, Stable $stable, array $myEquine = [])
    {
        parent::__construct( $name, $adress);
        $this->setStable($stable);
        $this->setMyEquine($myEquine);
    }

    public function __toString():string{
        return "\n Je suis {$this->getName()}, mon adresse est {$this->getAdress()->__toString()} je travail à l'écurie {$this->getStable()->getName()} et j'ai " . count($this->myEquine) . " équidés {$this->myEquineToString()} \n";
    }

    /** Return a string with rider's horses  */
    public function myEquineToString():string{
        $tab = $this->myEquine;
        $str = '';
        foreach ($tab as $t){
            $str .= "\n {$t->__toString()}";
        }
        if (count($tab) === 0){
            return '';
        }
        return $str;
    }

    /**
     * @return Stable
     */
    public function getStable(): Stable
    {
        return $this->stable;
    }

    /**
     * @param Stable $stable
     * @return Rider
     */
    public function setStable(Stable $stable): Rider
    {
        $this->stable = $stable;
        return $this;
    }

    /**
     * @return array
     */
    public function getMyEquine(): array
    {
        return $this->myEquine;
    }

    /**
     * @param array $myEquine
     * @return Rider
     * @throws Exception
     */
    public function setMyEquine(array $myEquine): Rider
    {
        if(count($myEquine) + count($this->getMyEquine()) <= 5) {
            $this->myEquine = $myEquine;
            return $this;
        }
        else throw new Exception("Un cavalier ne peut pas avoir plus de 5 chevaux");
    }

}