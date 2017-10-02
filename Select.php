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

    public function sqlCode($where, $when, $what)
    {
        return "SELECT $what FROM $where WHERE $when";
    }
}