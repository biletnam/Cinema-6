<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 12.09.17
 * Time: 19:40
 */

class Booking
{
    public function __construct()
    {
        session_start();
    }

    public function addReservation($seat)
    {
        sleep(10);
        if($this->check($seat))
        {
            ;
        }
        else
        {
            $_SESSION['errorSeat'] = "To miejsce jest już zajęte";
            header('Location: index.php');
            exit();
        }
    }

    private function check($checkSeat)
    {
        require_once "ListReservation.php";

        $list = new ListReservation();
        $list->setList();

        foreach ($list->getList() as $item)
        {
            if($item == $checkSeat)
            {
                return false;
            }
            return true;
        }

    }
}

?>