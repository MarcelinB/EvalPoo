<?php
namespace App\Model;

class Stable {
    /**
     * @var string
     */
    protected string $name;
    /**
     * @var Adress
     */
    protected Adress $adress;
    /**
     * @var Manager|null
     */
    protected ?Manager $manager = null;

    /**
     * @param string $name
     * @param Adress $adress
     * @param ?Manager $manager
     */

    public function __construct(string $name, Adress $adress, ?Manager $manager = null)
    {
        $this->setName($name);
        $this->setAdress($adress);
        $this->setManager($manager);
    }

    /**
     * @return string
     */
    public function __toString():string {
        return "Nom de l'écurie : {$this->getName()}, adresse : {$this->getAdress()->__toString()}";
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
     * @return Manager|null
     */
    public function getManager(): ?Manager
    {
        return $this->manager;
    }

    /**
     * @param Manager|null $manager
     * @return Stable
     */
    public function setManager(?Manager $manager): Stable
    {
        $this->manager = $manager;
        return $this;
    }

}