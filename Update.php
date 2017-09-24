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

    public function sqlCode($where, $when, $what)
    {
        return "UPDATE $where SET $what WHERE $when";
    }
}
?>