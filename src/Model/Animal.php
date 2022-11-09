<?php
namespace App\Model;
abstract class Animal {
    protected string $name;


    public function __construct(string $name)
    {
        $this->setName($name);
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
     * @return Animal
     */
    public function setName(string $name): Animal
    {
        $this->name = $name;
        return $this;
    }
}