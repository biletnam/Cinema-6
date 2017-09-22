<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 9/20/17
 * Time: 7:52 PM
 */

class Insert extends Base
{
    public function __construct()
    {
        parent::__construct();
    }

    public function query($where, $when, $what)
    {
        $sql = "INSERT INTO $where ($when) VALUES ($what)";

        try
        {
            $query = $this->getBase()->query($sql);

            if(!$query)
            {
                throw new Exception();
            }
        }
        catch (Exception $e)
        {
            $_SESSION['errorSeat'] = "Nastąpił problem z rezerwacją miejsc";
        }
    }
}