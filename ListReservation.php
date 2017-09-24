<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 12.09.17
 * Time: 22:08
 */

class ListReservation
{
    private $listReservation;
    private $base;
    private $idSeance;

    public function __construct($idSeance = 1)
    {
        $this->listReservation = array();

        $this->idSeance = $idSeance;
    }

    public function setList()
    {
        require_once "Base.php";
        require_once "Select.php";

        $this->base = new Select();

        $quary = $this->base->query("Booking", "IdSeance = $this->idSeance", "FreeSeat");

        if($quary->num_rows > 0)
        {
            while  ($line = $quary->fetch_assoc())
            {
                $this->addElementList($line['FreeSeat']);
            }
        }
        $this->base->closeBase();
    }

    private function addElementList($seat)
    {
        array_push($this->listReservation, $seat);
    }

    public function getList()
    {
        return $this->listReservation;
    }
}
?>