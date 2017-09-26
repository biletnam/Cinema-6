<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 9/24/17
 * Time: 5:38 PM
 */

abstract class Roster
{
    protected $listReservation;

    public function __construct()
    {
        $this->listReservation = array();
    }

    abstract public function setList();

    protected function addElementList($element)
    {
        array_push($this->listReservation, $element);
    }

    public function getList()
    {
        return $this->listReservation;
    }

    public function removeElementList($number)
    {
        unset($this->listReservation[$number]);
    }
}
?>