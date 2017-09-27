<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 9/24/17
 * Time: 8:02 PM
 */

class Seance
{
    private $idSeance;
    private $film;
    private $nrRoom;
    private $dataStart;
    private $dataFreeHall;

    public function __construct($idSeance, $film, $nrRoom, $dataStart, $dataFreeHall)
    {
        require_once "Film.php";

        $this->setIdSeance($idSeance);
        $this->setFilm($film);
        $this->setNrRoom($nrRoom);
        $this->setDataStart($dataStart);
        $this->setDataFreeHall($dataFreeHall);
    }

    /**
     * @param mixed $idSeance
     */
    public function setIdSeance($idSeance)
    {
        $this->idSeance = $idSeance;
    }

    /**
     * @param mixed $film
     */
    public function setFilm($film)
    {
        $this->film = $film;
    }

    /**
     * @param mixed $nrRoom
     */
    public function setNrRoom($nrRoom)
    {
        $this->nrRoom = $nrRoom;
    }

    /**
     * @param mixed $dataStart
     */
    public function setDataStart($dataStart)
    {
        $this->dataStart = DateTime::createFromFormat('Y-m-d H:i:s', $dataStart);
    }

    /**
     * @param mixed $dataFreeHall
     */
    public function setDataFreeHall($dataFreeHall)
    {
        $this->dataFreeHall = DateTime::createFromFormat('Y-m-d H:i:s', $dataFreeHall);
    }

    /**
     * @return mixed
     */
    public function getIdSeance()
    {
        return $this->idSeance;
    }

    /**
     * @return mixed
     */
    public function getFilm()
    {
        return $this->film;
    }

    /**
     * @return mixed
     */
    public function getNrRoom()
    {
        return $this->nrRoom;
    }

    /**
     * @return mixed
     */
    public function getDataStart()
    {
        return $this->dataStart;
    }

    /**
     * @return mixed
     */
    public function getDataFreeHall()
    {
        return $this->dataFreeHall;
    }

    public function __toString()
    {
        return '<div class="seance" onclick="seance(this);" id="'.$this->getIdSeance().'">'.$this->definitionPosterFilm().$this->definitionFilm().
            $this->definitionButton().$this->definitionDivClear().'</div>';
    }

    private function definitionPosterFilm()
    {
        return '<div class="poster"><img src="img/'.$this->getFilm()->getIdFilm().'.'.$this->getFilm()->getFilmPoster() .
            '"></div>';
    }

    private function definitionFilm()
    {
        return '<div class="film">'.$this->definitionTitleFilm().$this->definitionDescibeFilm().
            $this->definitionDataWhereSeance().'</div>';
    }

    private function definitionTitleFilm()
    {
        return '<div class="titleFilm">' . $this->getFilm()->getTitleFilm() . '</div>';
    }

    private function definitionDescibeFilm()
    {
        return '<div class="describeFilm">' . $this->definitionTimeFilm() . '|' . $this->definitionDirectoryFilm() .
            '|' . $this->definitionTypeFilm().'|'.$this->definitionDataRelease().'</div>';
    }

    private function definitionTimeFilm()
    {
        return '<span class="describe">' . $this->formatDateTimeFilm() . '</span>';
    }

    private function formatDateTimeFilm()
    {
        return $this->getFilm()->getTimeFilm()->format("H:i");
    }

    private function definitionDirectoryFilm()
    {
        return '<span class="describe">' . $this->getFilm()->getDirectory() . '</span>';
    }

    private function definitionTypeFilm()
    {
        return '<span class="describe">' . $this->getFilm()->getTypeFilm() . '</span>';
    }

    private function definitionDataRelease()
    {
        return '<span class="describe">'.$this->formatDataReleaseFilm().'</span>';
    }
    private function formatDataReleaseFilm()
    {
        return $this->getFilm()->getDataRelease()->format('d-m-Y');
    }

    private function definitionDataWhereSeance()
    {
        return '<div class="dataSeance">Data Seansu: '.$this->definitionDataSeance().' w sali '.$this->getNrRoom().'</div>';
    }
    private function definitionDataSeance()
    {
        return $this->getDataStart()->format('H:i d-m-Y');
    }
    private function definitionButton()
    {
        return '<div class="button"><form method="post" action="choseSeat.php"><input type="hidden" value="'.$this->getIdSeance()
            .'" name="idSeance"><input type="submit" value="Wybierz miejsce" id="submit'.$this->getIdSeance().'"></form></div>';
    }
    private function definitionDivClear()
    {
        return '<div style="clear: both;"></div>';
    }
}
?>