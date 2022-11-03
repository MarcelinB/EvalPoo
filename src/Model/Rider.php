<?php
namespace App\Model;

use App\Model\Stable;
use App\Model\Equine;

class Rider extends Human {
    protected Stable $stable;
    protected $myEquine = [];


    public function __construct($name, $adress, Stable $stable, array $myEquine)
    {
        parent::__construct( $name, $adress);
        $this->setStable($stable);
        $this->setMyEquine($myEquine);

    }

    public function __toString():string{
        return "Je suis {$this->getName()}, jabite au {$this->getAdress()->__toString()} je travail a {$this->getStable()->__toString()} et j'ai" . count($this->myEquine) . " 2 belles bêtes -->
        {$this->myEquineToString()}";
    }

    public function myEquineToString():string{
        $tab = $this->myEquine;
        $str = '';
        foreach ($tab as $t){
            $str .= " {$t->__toString()}";
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
     */
    public function setMyEquine(array $myEquine): Rider
    {
        $this->myEquine = $myEquine;
        return $this;
    }

}