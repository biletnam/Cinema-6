<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 08.10.17
 * Time: 18:44
 */

class GenerteRegister extends GenereteForm
{
    public function generateForm()
    {
        return '<div id="conteiner"><form method="post" action="#">'.$this->inputLogin().$this->errorLogin().$this->inputPassword().
            $this->errorPassword().$this->inputRepeatPassowrd().$this->inputEmail().$this->inputDignity().$this->inputRule().
            $this->inputSubmit("Zarejestruj się").'</form></div>';
    }

    private function errorLogin()
    {
        $tmpCode = '';
        if(isset($_SESSION['errorLogin']))
        {
            $tmpCode = $_SESSION['errorLogin'];
            unset($_SESSION['errorLogin']);
        }
        return $tmpCode;
    }

    private function errorPassword()
    {
        $tmpCode = '';
        if(isset($_SESSION['errorPass']))
        {
            $tmpCode = $_SESSION['errorPass'];
            unset($_SESSION['errorPass']);
        }
        return $tmpCode;
    }

    private function inputRepeatPassowrd()
    {
        return '<input type="password" name="repeatPass" placeholder="Powtórz hasło">';
    }

    private function inputEmail()
    {
        $tmpCode = '<input type="email" name="email" placeholder="E-mail">';
        if(isset($_SESSION['errorEmail']))
        {
            $tmpCode = $tmpCode.$_SESSION['errorEmail'];
            unset($_SESSION['errorEmail']);
        }
        return $tmpCode;
    }

    private function inputDignity()
    {
        return '<input type="text" name="dignity" placeholder="Godność">';
    }

    private function inputRule()
    {
        $tmpCode = '<label><input type="checkbox" name="rule"><a href="regulamin.pdf" target="_blank">Akceptuje regulamin</a></label>';
        if(isset($_SESSION['errorRule']))
        {
            $tmpCode = $tmpCode.$_SESSION['errorRule'];
            unset($_SESSION['errorRule']);
        }
        return $tmpCode;
    }
}