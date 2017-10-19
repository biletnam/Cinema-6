<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 16.10.17
 * Time: 21:28
 */

class GenereteUpdate extends GenereteRegister
{
    public function __construct()
    {
        parent::__construct();
    }

    public function generateForm()
    {
        return parent::generateForm();
    }

    protected function inputRule()
    {
        $tmpCode = '<input type="password" name="oldPass" placeholder="Obecne hasło">';
        if(isset($_SESSION['errorOldPass']))
        {
            $tmpCode .= $_SESSION['errorOldPass'];
            unset($_SESSION['errorOldPass']);
        }
        return $tmpCode;
    }

    protected function inputLogin()
    {
        return '';
    }

    protected function inputPassword()
    {
        return '';
    }

    protected function errorPassword()
    {
        return '';
    }

    protected function inputRepeatPassowrd()
    {
        return '';
    }

    protected function inputSubmit($value)
    {
        return parent::inputSubmit("Zaktalizuj danę");
    }
}