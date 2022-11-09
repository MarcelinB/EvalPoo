<?php
namespace App\Model;

use Exception;

class Adress {

    /**
     * @var int
     */
    protected int $number;
    /**
     * @var string
     */
    protected string $street;
    /**
     * @var int
     */
    protected int $postCode;
    /**
     * @var string
     */
    protected string $city;

    /**
     * @param int $number
     * @param string $street
     * @param int $postCode
     * @param string $city
     */
    public function __construct(int $number, string $street, int $postCode, string $city)
    {
        $this->setNumber($number);
        $this->setStreet($street);
        $this->setPostCode($postCode);
        $this->setCity($city);
    }

    /**
     * @return string
     */
    public function __toString():string {
        return "{$this->getNumber()} {$this->getStreet()} {$this->getPostCode()} {$this->getCity()}";
    }

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @param int $number
     * @return Adress
     */
    public function setNumber(int $number): Adress
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @param string $street
     * @return Adress
     */
    public function setStreet(string $street): Adress
    {
        $this->street = $street;
        return $this;
    }

    /**
     * @return int
     */
    public function getPostCode(): int
    {
        return $this->postCode;
    }

    /**
     * @param int $postCode
     * @return Adress
     */
    public function setPostCode(int $postCode): Adress
    {
        $this->postCode = $postCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return Adress
     */
    public function setCity(string $city): Adress
    {
        $this->city = $city;
        return $this;
    }

}