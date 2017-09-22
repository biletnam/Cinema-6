<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 14.09.17
 * Time: 09:32
 */

abstract class Base
{
    private $Base;
    public function __construct()
    {
        mysqli_report(MYSQLI_REPORT_STRICT);

        $this->connect();
    }

    private function connect()
    {
        try
        {
            $this->Base = new mysqli("127.0.0.1", "root", "nhy6&UJM", "cinema");

            if($this->Base->connect_errno != 0)
            {
                throw new Exception();
            }
        }
        catch (Exception $e)
        {
            echo "Spróbuj zarezerwować miejsce w innym terminie".$e;
        }
    }

    abstract public function query($where, $when, $what);

    function getBase()
    {
        return $this->Base;
    }

    public function closeBase()
    {
        $this->Base->close();
    }
}
?>