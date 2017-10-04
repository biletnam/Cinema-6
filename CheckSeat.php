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
        session_start();
        $arrayErrorSeat = $this->addSeat($idSeance, $idUser, $seat);
        if(empty($arrayErrorSeat))
        {
            $_SESSION['goodSeat'] = "Wszystkie miejsca na seans zarezerowane poprawnie";
            header('Location: index.php');
        }
        else
        {
            $tmpMessage = "Te miejsce nie udało się zarezerwować:";

            foreach ($arrayErrorSeat as $item)
            {
                $tmpMessage = $tmpMessage.' '.$item;
            }
            $_SESSION['errorSeat'] = $tmpMessage;
            header("Location: choseSeat.php?idSeance=$idSeance");
        }
    }

    private function addSeat($idSeance, $idUser, $seat)
    {
        $errorSeat = array();

        sleep(10);
        foreach ($seat as $item)
        {
            if($this->check($item, $idSeance))
            {
                require_once "AddBooking.php";
                $add = new AddBooking();

                $add->AddSeat($idSeance, $idUser, $item);
            }
            else
            {
                array_push($errorSeat, $item);
            }
        }

        return $errorSeat;
    }

    private function check($checkSeat, $idSeance)
    {
        require_once "Roster.php";
        require_once "ListReservation.php";

        $list = new ListReservation($idSeance);
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