<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 12.09.17
 * Time: 19:40
 */

class CheckSeat
{
    public function addReservation($idSeance, $idUser, $seat)
    {
//        echo $idSeance." ".$idUser." ".$seat."<br>";
        if($this->check($seat))
        {
            require_once "AddBooking.php";
            $add = new AddBooking();

            $add->AddSeat($idSeance, $idUser, $seat);

            $_SESSION['goodSeat'] = "Rezerwacja miejsca na seans";
        }
        else
        {
            $_SESSION['errorSeat'] = "To miejsce jest już zajęte";
            header('Location: choseSeat.php');
            exit();
        }
    }

    private function check($checkSeat)
    {
        require_once "Roster.php";
        require_once "ListReservation.php";

        $list = new ListReservation();
        $list->setList();

        foreach ($list->getList() as $item)
        {
            if($item == $checkSeat)
            {
                return false;
            }
        }
        return true;
    }
}

?>