<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 9/22/17
 * Time: 10:59 PM
 */

class Update extends Base
{
    public function __construct()
    {
        parent::__construct();
    }

    public function query($where, $when, $what)
    {
        $sql = "UPDATE $where SET $what WHERE $when";

        try
        {
            $this->getBase()->query($sql);
        }
        catch (Exception $e)
        {
            $_SESSION['error'] = 'Nastąpił problem z bazą danych';
        }
    }
}
?>