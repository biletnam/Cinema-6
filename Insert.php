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

    public function sqlCode($where, $when, $what)
    {
        return "INSERT INTO $where ($when) VALUES ($what)";
    }
}