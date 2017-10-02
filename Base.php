<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 14.09.17
 * Time: 09:32
 */

abstract class Base
{
    protected $Base;
    public function __construct()
    {
        mysqli_report(MYSQLI_REPORT_STRICT);

        $this->connect();
    }

    private function connect()
    {
        try
        {
            $this->Base = new mysqli("127.0.0.1", "cinema", "Qwerty123", "cinema");

            if($this->Base->connect_errno != 0)
            {
                throw new Exception();
            }
        }
        catch (Exception $e)
        {
            echo "Spróbuj zarezerwować miejsce w innym terminie";
        }
    }

    public function query($where, $when, $what = "*")
    {
        $sql = $this->sqlCode($where, $when, $what);

        try
        {
            $query = $this->Base->query($sql);

            if(!$query)
            {
                throw new Exception();
            }
            return $query;
        }
        catch (Exception $e)
        {
			echo 'Wystąpił problem z baza danych';
            return false;
        }
    }

    abstract protected function sqlCode($where, $when, $what);

    public function closeBase()
    {
        $this->Base->close();
    }
}
?>
