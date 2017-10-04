<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 10/3/17
 * Time: 5:46 PM
 */

abstract class Validate
{
    public function validateData($data)
    {
        if($this->checkData($data) == true)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    abstract protected function checkData($data);
}