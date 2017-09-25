<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 9/25/17
 * Time: 11:58 AM
 */

class Film
{
    private $idFilm;
    private $titleFilm;
    private $directory;
    private $typeFilm;
    private $timeFilm;
    private $DataRelease;
    private $filmPoster;

    public function __construct($idFilm, $titleFilm, $directory, $typeFilm, $timeFilm, $DataRelease, $filmPoster)
    {
        $this->setIdFilm($idFilm);
        $this->setTitleFilm($titleFilm);
        $this->setDirectory($directory);
        $this->setTypeFilm($typeFilm);
        $this->setTimeFilm($timeFilm);
        $this->setDataRelease($DataRelease);
        $this->setFilmPoster($filmPoster);
    }

    /**
     * @param mixed $idFilm
     */
    public function setIdFilm($idFilm)
    {
        $this->idFilm = $idFilm;
    }
    /**
     * @param mixed $titleFilm
     */
    public function setTitleFilm($titleFilm)
    {
        $this->titleFilm = $titleFilm;
    }
    /**
     * @param mixed $directory
     */
    public function setDirectory($directory)
    {
        $this->directory = $directory;
    }
    /**
     * @param mixed $typeFilm
     */
    public function setTypeFilm($typeFilm)
    {
        $this->typeFilm = $typeFilm;
    }
    /**
     * @param mixed $timeFilm
     */
    public function setTimeFilm($timeFilm)
    {
        $this->timeFilm = DateTime::createFromFormat('H:i:s', $timeFilm);
    }
    /**
     * @param mixed $DataRelease
     */
    public function setDataRelease($DataRelease)
    {
        $this->DataRelease = DateTime::createFromFormat('Y-m-d', $DataRelease);
    }
    /**
     * @param mixed $filmPoster
     */
    public function setFilmPoster($filmPoster)
    {
        $this->filmPoster = $filmPoster;
    }

    /**
     * @return mixed
     */
    public function getIdFilm()
    {
        return $this->idFilm;
    }
    /**
     * @return mixed
     */
    public function getTitleFilm()
    {
        return $this->titleFilm;
    }
    /**
     * @return mixed
     */
    public function getDirectory()
    {
        return $this->directory;
    }
    /**
     * @return mixed
     */
    public function getTypeFilm()
    {
        return $this->typeFilm;
    }
    /**
     * @return mixed
     */
    public function getTimeFilm()
    {
        return $this->timeFilm;
    }
    /**
     * @return mixed
     */
    public function getDataRelease()
    {
        return $this->DataRelease;
    }
    /**
     * @return mixed
     */
    public function getFilmPoster()
    {
        return $this->filmPoster;
    }
}