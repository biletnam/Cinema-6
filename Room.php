<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 12.09.17
 * Time: 19:43
 */

class Room
{
    private $listVertical;
    private $listHorizontal;

    public function __construct()
    {
        $this->listVertical = array();
        $this->listHorizontal = array();
    }

    public function generateVertical()
    {
        for($i = 65; $i < 75; $i++)
        {
            $this->setList($this->listVertical, chr($i));
        }
    }

    public function generateHorizontal()
    {
        for($i = 1; $i < 17; $i++)
        {
            $this->setList($this->listHorizontal, $i);
        }
    }

    private function setList(&$array, $value)
    {
        array_push($array, $value);
    }

    public function getListVertical()
    {
        return $this->listVertical;
    }

    /**
     * @return array
     */
    public function getListHorizontal()
    {
        return $this->listHorizontal;
    }
}