<?php
namespace App\Model;

class Stable {
    protected string $name;
    protected Adress $adress;
    protected Manager $manager;

    /**
     * @param string $name
     * @param Adress $adress
     * @param Manager $manager
     */

    public function __construct(string $name, Adress $adress, Manager $manager)
    {
        $this->setName($name);
        $this->setAdress($adress);
        $this->setManager($manager);
    }

    public function __toString():string {
        return "{$this->getName()}";
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
     * @return Stable
     */
    public function setName(string $name): Stable
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
     * @return Stable
     */
    public function setAdress(Adress $adress): Stable
    {
        $this->adress = $adress;
        return $this;
    }

    /**
     * @return Manager
     */
    public function getManager(): Manager
    {
        return $this->manager;
    }

    /**
     * @param Manager $manager
     * @return Stable
     */
    public function setManager(Manager $manager): Stable
    {
        $this->manager = $manager;
        return $this;
    }




}