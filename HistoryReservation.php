<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 11.10.17
 * Time: 19:03
 */

class HistoryReservation extends Roster
{
    private $CountRows;
    private $idUser;

    public function __construct()
    {
        parent::__construct();
        require_once "User.php";
        $user = unserialize($_SESSION['user']);
        $this->idUser = $user->getId();
    }

    public function setList($startLimit = 0)
    {
        require_once "Base.php";
        require_once "Select.php";
        $this->setCountRows();
        $base = new Select();

        $query = $base->query('Booking', "IdUser = $this->idUser ORDER BY DataBook DESC LIMIT $startLimit, 20",
            'IdBook');
        while ($line = $query->fetch_row())
        {
           $this->setOneReservation($line[0]);
        }
        $query->free_result();
        $base->closeBase();
    }

    private function setOneReservation($idBook)
    {
        require_once "Reservation.php";
        $tmpBase = new Select();

        $query = $tmpBase->query("Booking, Film, Seance",
            "Seance.IdSeance = Booking.IdSeance AND Seance.IdFilm = Film.IdFilm AND Booking.IdBook = $idBook",
            "Booking.FreeSeat, Film.IdFilm, Film.TitleFilm, Film.PosterFilm, Seance.NrRoom, Seance.DataStartFilm");

        $line = $query->fetch_assoc();
        $tmpReservation = new Reservation($line);
        $this->addElementList($tmpReservation);

        $query->free_result();
        $tmpBase->closeBase();
    }

    /**
     * @return mixed
     */
    public function getCountRows()
    {
        return $this->CountRows;
    }

    /**
     * @param mixed $CountRows
     */
    private function setCountRows()
    {
        $base = new Select();

        $query = $base->query('Booking', "IdUser = $this->idUser", "COUNT(*)");
        $line = $query->fetch_row();
        $this->CountRows = $line[0];

        $query->free_result();
        $base->closeBase();
    }
}
?>