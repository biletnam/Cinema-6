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
    private $countRows;

    public function __construct()
    {
        parent::__construct();
    }

    public function setList($limit = 0)
    {
        require_once "Base.php";
        require_once "Select.php";

        $this->base = new Select();

        $tmpQuery = $this->base->query("Seance",
            "DataStartFilm > now() + INTERVAL 15 MINUTE AND BusySeat < 160 ",
            "count(*)");

        $tmpRow = $tmpQuery->fetch_row();
        $this->countRows = $tmpRow[0];

        $query = $this->base->query("Seance, Film, Directory, TypeFilm",
            "Seance.IdFilm = Film.IdFilm AND Film.IdDirectory = Directory.IdDirectory AND ".
            "Film.IdTypeFilm = TypeFilm.IdTypeFilm AND DataStartFilm > now() + INTERVAL 15 MINUTE AND BusySeat < 160 ".
            "ORDER BY Seance.DataStartFilm ASC LIMIT $limit, 10",
            "Seance.IdSeance, Seance.NrRoom, Seance.DataStartFilm, Seance.DataEndFilm, ".
            "Film.IdFilm, Film.TitleFilm, Film.TimeFilm, Film.DataRelease, Film.PosterFilm, ".
            "Directory.NameDirectory, TypeFilm.NameTypeFilm");

		if($query != false)
		{
		    if($query->num_rows > 0)
		    {
		        while ($line = $query->fetch_assoc())
		        {
		            $this->addElementList($this->setSeanceToList($line));
		        }
		    }
		    $this->base->closeBase();
		}
    }

    private function setSeanceToList($row)
    {
        require_once "Seance.php";
        return new Seance($row['IdSeance'], $this->setFilmToSeance($row), $row['NrRoom'], $row['DataStartFilm'],
            $row['DataEndFilm']);
    }

    private function setFilmToSeance($row)
    {
        require_once "Film.php";
        return new Film($row['IdFilm'], $row['TitleFilm'], $row['NameDirectory'], $row['NameTypeFilm'], $row['TimeFilm'],
            $row['DataRelease'], $row['PosterFilm']);
    }

    public function getCountRows()
    {
        return $this->countRows;
    }
}
?>
