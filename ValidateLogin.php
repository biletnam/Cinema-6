<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 09.10.17
 * Time: 08:27
 */

class ValidateLogin extends Validate
{
    protected function checkData($data)
    {
        if(($this->checkLengthLogin($data)) | ($this->checkCharLogin($data)) | ($this->noUniueLogin($data)))
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    private function checkLengthLogin($login)
    {
        if((strlen($login) < 3) | (strlen($login) > 10))
        {
            session_start();
            $_SESSION['errorLogin'] = 'Login powinen zawierać od 3 do 10 znaków';
            return true;
        }
        else
        {
            return false;
        }
    }

    private function checkCharLogin($login)
    {
        if(ctype_alnum($login))
        {
            return false;
        }
        else
        {
            session_start();
            $_SESSION['errorLogin'] = 'Login może zawierać tylko znaki alfanumeryczne';
            return true;
        }
    }

    private function noUniueLogin($login)
    {
        require_once "Base.php";
        require_once "Select.php";
        $base = new Select();

        $query = $base->query("User", "Email = '$login'");

        if($query->num_rows > 0)
        {
            session_start();
            $_SESSION['errorLogin'] = 'Taki login istnieje.';
            return true;
        }

        $base->closeBase();
    }
}