<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 9/22/17
 * Time: 3:32 PM
 */

class AddBooking
{
    private $base;

    public function __construct()
    {
        require_once "Base.php";
        require_once "Insert.php";

        $this->base = new Insert();
    }

    public function AddSeat($idSeance, $idUser, $seat)
    {
        $this->base->query("Booking", "IdSeance, IdUser, FreeSeat", "$idSeance, $idUser, '$seat'");
        $this->BusySeat($idSeance);

        $this->base->closeBase();
    }

    private function BusySeat($idSeance)
    {
        require_once "Update.php";
        $baseTmp = new Update();

        $baseTmp->query("Seance", "idSeance = $idSeance", "BusySeat = BusySeat + 1");

        $baseTmp->closeBase();
    }
}
?>