<?php
namespace App\Model;
use Exception;

class Equine extends Animal {

    protected static int $id;
    protected string $color;
    protected int $water;
    protected Rider $rider;
    protected string $category;

    /**
     * @param string $color
     * @param int $water
     * @param Rider $rider
     * @param string $category
     */
    public function __construct(string $color, int $water, Rider $rider, string $category)
    {
        $this->setColor($color);
        $this->setWater($water);
        $this->setRider($rider);
        $this->setCategory($category);
    }


    /**
     * @return int
     */
    public static function getId(): int
    {
        return self::$id;
    }

    /**
     * @param int $id
     */
    public static function setId(int $id): void
    {
        self::$id = $id;
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

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @param string $category
     * @return Equine
     */
    public function setCategory(string $category): Equine
    {
        $tCategory = ['Sheitland', 'Poney', 'Horse'];
        foreach ($tCategory as $cat){
            if($category === $cat){
                $this->category = $category;
                return $this;
            }
        }
        throw new Exception('CATEGORY NOT VALID');
    }



}