<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 16.09.17
 * Time: 11:56
 */

class Select extends Base
{
    public function __construct()
    {
        parent::__construct();
    }

    public function query($where, $when, $what = "*")
    {
        $sql = "SELECT $what FROM $where WHERE $when";

        try
        {
            $quary = $this->getBase()->query($sql);
            if(!$quary)
            {
                throw new Exception();
            }
            return $quary;
        }
        catch (Exception $e)
        {
            echo "Nastąpił problem z rezerwacją miejsc";
        }
    }
}