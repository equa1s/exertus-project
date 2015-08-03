<?php
/**
 * Created by PhpStorm.
 * User: elia
 * Date: 03.08.15
 * Time: 14:30
 */

class Coordinates {

    private $x;
    private $y;
    private $z;

    function __construct($x, $y, $z)
    {
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
    }

    /**
     * @return mixed
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @return mixed
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * @return mixed
     */
    public function getZ()
    {
        return $this->z;
    }



}