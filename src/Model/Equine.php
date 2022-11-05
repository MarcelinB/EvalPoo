<?php
namespace App\Model;


abstract class Equine extends Animal {

    protected string $id ;
    protected string $color;
    protected int $water;
    public static int $i = 0;

    /**
     *
     * @param string $color
     * @param int $water
     * @param string $name
     */
    public function __construct(string $color, int $water, string $name)
    {
        self::$i++;
        parent::__construct( $name);
        $this->setColor($color);
        $this->setWater($water);
        $this->setId();
    }
    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return Equine
     */
    public function setId(): Equine
    {
        $this->id = '000' . substr($this->getName(), 0, 1) . substr($this->getColor(), 0, 1) . self::$i;
        return $this;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @param string $color
     * @return Equine
     */
    public function setColor(string $color): Equine
    {
        $this->color = $color;
        return $this;
    }

    /**
     * @return int
     */
    public function getWater(): int
    {
        return $this->water;
    }

    /**
     * @param int $water
     * @return Equine
     */
    public function setWater(int $water): Equine
    {
        $this->water = $water;
        return $this;
    }

    /**
     * @return Rider
     */
    public function getRider(): Rider
    {
        return $this->rider;
    }

    /**
     * @param Rider $rider
     * @return Equine
     */
    public function setRider(Rider $rider): Equine
    {
        $this->rider = $rider;
        return $this;
    }

}