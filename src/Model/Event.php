<?php
namespace App\Model;
abstract class Event {
    /**
     * @var Adress
     */
    protected Adress $adress;
    /**
     * @var string
     */
    protected string $name;
    /**
     * @var int
     */
    protected int $maxCommitments;
    /**
     * @var int
     */
    protected int $maxWater;


    /**
     * @param Adress $adress
     * @param string $name
     * @param int $maxCommitments
     * @param int $maxWater
     */
    public function __construct(Adress $adress, string $name, int $maxCommitments, int $maxWater)
    {
        $this->setAdress($adress);
        $this->setName($name);
        $this->setMaxCommitments($maxCommitments);
        $this->setMaxWater($maxWater);
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
     * @return Event
     */
    public function setAdress(Adress $adress): Event
    {
        $this->adress = $adress;
        return $this;
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
     * @return Event
     */
    public function setName(string $name): Event
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxCommitments(): int
    {
        return $this->maxCommitments;
    }

    /**
     * @param int $maxCommitments
     * @return Event
     */
    public function setMaxCommitments(int $maxCommitments): Event
    {
        $this->maxCommitments = $maxCommitments;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxWater(): int
    {
        return $this->maxWater;
    }

    /**
     * @param int $maxWater
     * @return Event
     */
    public function setMaxWater(int $maxWater): Event
    {
        $this->maxWater = $maxWater;
        return $this;
    }

}