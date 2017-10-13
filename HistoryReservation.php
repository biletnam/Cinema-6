<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 11.10.17
 * Time: 19:03
 */

class HistoryReservation extends Roster
{
    private $rowsCount = null;

    public function __construct()
    {
        parent::__construct();
    }

    public function setList()
    {
        require_once "Person.php";
        require_once "User.php";
        $user = unserialize($_SESSION['user']);
        require_once "Base.php";
        require_once "Select.php";
        $base = new Select();
        $code = null;

        $query = $base->query('Booking', 'IdUser = '.$user->getId(), 'FreeSeat, IdSeance');

        while ($line = $query->fetch_assoc())
        {
           $this->setOneReservation($line['FreeSeat'], $line['IdSeance']);
        }
        echo $code;

        $base->closeBase();
    }

    private function setOneReservation($seat, $id)
    {
        require_once "Reservation.php";
        $base = new Select();

        $query = $base->query("Booking, Film, Seance",
            "Seance.IdSeance = Booking.IdSeance AND Seance.IdFilm = Film.IdFilm AND Seance.IdSeance = $id"
            ." AND FreeSeat = '$seat'",
            "Booking.FreeSeat, Film.IdFilm, Film.TitleFilm, Film.PosterFilm, Seance.NrRoom, "
            ."Seance.DataStartFilm");
        $tmpReservation = new Reservation($query->fetch_assoc());

        $this->addElementList($tmpReservation);
        $base->closeBase();
    }
}
?>