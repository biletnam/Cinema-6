<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 12.09.17
 * Time: 22:05
 */

class Reservation
{
    private $seat;

    public function setSeat($seat)
    {
        $this->seat = $seat;
    }

    public function getSeat() {
        return $this->seat;
    }
}
?>