<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 11.10.17
 * Time: 19:44
 */

class Reservation
{
    private $film = null;
    private $dataStart = null;
    private $seat = null;
    private $nrRoom = null;

    public function __construct($row)
    {
        require_once "Film.php";
        $this->setFilm(new Film($row['IdFilm'], $row['TitleFilm'], null, null, null, null,
            $row['PosterFilm']));
        $this->dataStart = DateTime::createFromFormat('Y-m-d H:i:s', $row['DataStartFilm']);
        $this->seat = $row['FreeSeat'];
        $this->nrRoom = $row['NrRoom'];
    }

    /**
     * @return Film|null
     */
    public function getFilm()
    {
        return $this->film;
    }

    /**
     * @return null
     */
    public function getSeat()
    {
        return $this->seat;
    }

    /**
     * @param Film|null $film
     */
    private function setFilm($film)
    {
        $this->film = $film;
    }

    /**
     * @param null $seat
     */
    public function setSeat($seat)
    {
        $this->seat = $seat;
    }

    public function __toString()
    {
        return '<div class="element">'.$this->posterFilm().$this->FilmTitle().'</div>';
    }

    private function posterFilm()
    {
        return'<div class="poster"><img src="img/'.$this->formatPoster().'"/></div>';
    }

    private function formatPoster()
    {
        if($this->film->getFilmPoster() == '')
        {
            return '0.png';
        }
        else
        {
            return $this->film->getIdFilm().'.'.$this->film->getFilmPoster();
        }
    }

    private function FilmTitle()
    {
        return '<div class="describe">'.$this->titleFilm().$this->describeReservation().'</div><div style="clear: both;"></div>';
    }

    private function titleFilm()
    {
        return '<div class="titleFilm">'.$this->film->getTitleFilm().'</div>';
    }

    private function describeReservation()
    {
        return '<div class="describeReservation">'.$this->startFilm().' w sali '.$this->nrRoom
            .' miejsce '.$this->seat.'</div>';
    }

    private function startFilm()
    {
        return $this->dataStart->format('H:i d-m-Y');
    }
}
?>