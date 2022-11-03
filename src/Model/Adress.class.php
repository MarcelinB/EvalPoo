<?php

final class Adress {

    protected int $adress;
    protected string $street;
    protected string $postCode;
    protected string $city;

    /**
     * @param int $adress
     * @param string $street
     * @param string $postCode
     * @param string $city
     */
    public function __construct(int $adress, string $street, string $postCode, string $city)
    {
        $this->adress = $adress;
        $this->street = $street;
        $this->postCode = $postCode;
        $this->city = $city;
    }

    /**
     * @return int
     */
    public function getAdress(): int
    {
        return $this->adress;
    }

    /**
     * @param int $adress
     * @return Adress
     */
    public function setAdress(int $adress): Adress
    {
        $this->adress = $adress;
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
     * @return string
     */
    public function getPostCode(): string
    {
        return $this->postCode;
    }

    /**
     * @param string $postCode
     * @return Adress
     */
    public function setPostCode(string $postCode): Adress
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