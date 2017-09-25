<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 9/24/17
 * Time: 6:02 PM
 */

class ListSeance extends Roster
{
    private $base;
    public function __construct()
    {
        parent::__construct();
    }

    public function setList()
    {
        require_once "Base.php";
        require_once "Select.php";

        $this->base = new Select();

        $query = $this->base->query("Seance, Film, Directory, TypeFilm",
            "Seance.IdFilm = Film.IdFilm AND Film.IdDirectory = Directory.IdDirectory AND ".
            "Film.IdTypeFilm = TypeFilm.IdTypeFilm AND DataStartFilm > now() + INTERVAL 15 MINUTE",
            "Seance.IdSeance, Seance.NrRoom, Seance.DataStartFilm, Seance.DataEndFilm, Seance.BusySeat, ".
            "Film.IdFilm, Film.TitleFilm, Film.TimeFilm, Film.DataRelease, Film.PosterFilm, ".
            "Directory.NameDirectory, TypeFilm.NameTypeFilm");

        if($query->num_rows > 0)
        {
            while ($line = $query->fetch_assoc())
            {
                $this->addElementList($this->setSeanceToList($line));
            }
        }
        $this->base->closeBase();
    }

    private function setSeanceToList($row)
    {
        require_once "Seance.php";
        return new Seance($row['IdSeance'], $this->setFilmToSeance($row), $row['NrRoom'], $row['DataStartFilm'],
            $row['DataEndFilm'], $row['BusySeat']);
    }

    private function setFilmToSeance($row)
    {
        require_once "Film.php";
        return new Film($row['IdFilm'], $row['TitleFilm'], $row['NameDirectory'], $row['NameTypeFilm'], $row['TimeFilm'],
            $row['DataRelease'], $row['PosterFilm']);
    }
}
?>