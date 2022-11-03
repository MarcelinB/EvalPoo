<?php
namespace App\Model;

use App\Model\Stable;

class Rider extends Human {
    protected Stable $stable;

    public function __construct($name, $adress, Stable $stable)
    {
        parent::__construct( $name, $adress);
        $this->setStable($stable);
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
}