<?php
namespace App\Model;
abstract class Human {
    protected string $name;
    protected Adress $adress;

    /**
     * @param string $name
     * @param Adress $adress
     */
    public function __construct(string $name, Adress $adress)
    {
        $this->setName($name);
        $this->setName($adress);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Human
     */
    public function setName(string $name): Human
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return Adress
     */
    public function getAdress(): Adress
    {
        return $this->adress;
    }

    /**
     * @param Adress $adress
     * @return Human
     */
    public function setAdress(Adress $adress): Human
    {
        $this->adress = $adress;
        return $this;
    }

}