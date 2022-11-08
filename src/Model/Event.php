<?php
namespace App\Model;
use Exception;

abstract class Event implements CompetitionValidity {
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
     * @var array
     */
    protected array $participatingEquine = [];


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

    abstract function checkEquineValidity(Equine $equine, array $arrayEquine): bool;

    /**
     * Check if there are enough water in the event
     * @param array $arrayEquine
     * @return bool
     * @throws Exception
     */
    public function checkWaterValidity(array $arrayEquine):bool{
        $water = 0;
        $askForWater = 0;
        foreach ($this->getParticipatingEquine() as $alreadyParticipating){
            $water += $alreadyParticipating->getWater();
        }
        foreach ($arrayEquine as $equine){
            $askForWater += $equine->getWater();
        }
        if($water + $askForWater > $this->getMaxWater()) throw new Exception("Eau insuffisante pour inscrire vos équidés");
        return true;
    }

    /**
     * Register an array of horses (can be single) for the competition
     * @param array $arrayEquine
     * @return $this
     * @throws Exception
     */
    public function subscribeEquine(array $arrayEquine): self
    {
        if (count($arrayEquine) > ($this->getMaxCommitments() - count($this->getParticipatingEquine()))) throw new Exception("Places restantes insuffisantes inscrivez moins de chevaux");
        if ($this->checkWaterValidity($arrayEquine)){
            foreach ($arrayEquine as $equine){
                if($this->checkEquineValidity($equine, $arrayEquine)){
                    $this->participatingEquine[] = $equine;
                    echo "{$equine->getName()} inscrit \n";
                }
            }
        }
        return $this;
    }

    /**
     * @return array
     */
    public function getParticipatingEquine(): array
    {
        return $this->participatingEquine;
    }

    /**
     * @param array $participatingEquine
     * @return Event
     */
    public function setParticipatingEquine(array $participatingEquine): Event
    {
        $this->participatingEquine = $participatingEquine;
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