<?php
namespace App\Model;

use Exception;

abstract class Equine extends Animal implements ColorValidity {

    protected string $id ;
    protected string $color;
    protected int $water;
    public static int $i = 0;

    /**
     *
     * @param string $color
     * @param int $water
     * @param string $name
     * @throws Exception
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
     * @throws Exception
     */
    public function checkColor(string $color):bool {
        $authorizedColors = ['Alzan', 'Bai', 'Pie', 'Grey', 'White'];
        if (in_array($color, $authorizedColors, true)) {
            return true;
        }
        else throw new Exception("Couleur non authorisée");
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
        $this->id = '000-' . substr($this->getName(), 0, 1)  . '-'. substr($this->getColor(), 0, 1) . '-' . self::$i;
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
     * @throws Exception
     */
    public function setColor(string $color): Equine
    {
        if($this->checkColor($color)){
            $this->color = $color;
            return $this;
        }
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
}