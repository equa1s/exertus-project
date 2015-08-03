<?php
/**
 * Created by PhpStorm.
 * User: elia
 * Date: 03.08.15
 * Time: 14:30
 */

class Town {

    private $title;
    private $coordinates;

    function __construct($title, Coordinates $coordinates)
    {
        $this->title = $title;
        $this->coordinates = $coordinates;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return Coordinates
     */
    public function getCoordinates()
    {
        return $this->coordinates;
    }



}