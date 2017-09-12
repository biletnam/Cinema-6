<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 12.09.17
 * Time: 19:43
 */

class Room
{
    private $listSeat;

    public function __construct()
    {
        $this->listSeat = array();
    }

    public function generateVertical()
    {
        for($i = 0x41; $i < 0x52; $i++)
        {
            $this->generateHorizontal(chr($i));
        }
    }

    private function generateHorizontal($vertical)
    {
        $tmpArray = array();
        for($i = 1; $i < 17; $i++)
        {
            array_push($tmpArray, $vertical.$i);
        }
        array_push($this->listSeat, $tmpArray);
    }

    public function getListSeat()
    {
        return $this->listSeat;
    }
}