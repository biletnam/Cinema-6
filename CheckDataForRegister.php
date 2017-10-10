<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 09.10.17
 * Time: 17:46
 */

class CheckDataForRegister
{
    public function check($login, $pass, $passRepeat, $email, $rule)
    {
        require_once "Validate.php";
        $flags = true;

        if(!$this->checkLogin($login))
        {
            $flags = false;
        }
        if(!$this->checkPass($pass, $passRepeat))
        {
            $flags = false;
        }
        if(!$this->checkEmail($email))
        {
            $flags = false;
        }
        if(!$this->checkRule($rule))
        {
            $flags = false;
        }
        return $flags;
    }

    private function checkLogin($login)
    {
        require_once "ValidateLogin.php";
        $checkLogin = new ValidateLogin();

        return $checkLogin->validateData($login);
    }

    private function checkPass($pass, $passRepeat)
    {
        require_once "ValidatePassword.php";
        $checkPass = new ValidatePassword($passRepeat);

        return $checkPass->validateData($pass);
    }

    private function checkEmail($email)
    {
        require_once "ValidateEmail.php";
        $checkEmail = new ValidateEmail();

        return $checkEmail->validateData($email);
    }

    private function checkRule($rule)
    {
        if($rule != 'on')
        {
            $_SESSION['errorRule'] = 'Akceptuj regulamin';
            return false;
        }
        return true;
    }
}
?>