<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 9/24/17
 * Time: 5:38 PM
 */

class Roster
{
    protected $listReservation;

    public function __construct()
    {
        $this->listReservation = array();
    }

    protected function addElementList($seat)
    {
        array_push($this->listReservation, $seat);
    }

    public function getList()
    {
        return $this->listReservation;
    }
}
?>