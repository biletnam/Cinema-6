<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 08.10.17
 * Time: 18:44
 */

class GenerteRegister extends GenereteForm
{
    public function __construct()
    {
        parent::__construct();
    }

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
        $tmpCode = '<input type="password" name="repeatPass" placeholder="Powtórz hasło" ';
        if($this->rememberData != null)
        {
            $tmpCode .= 'value="'.$this->rememberData->getRepeatPass().'"';
        }
        return $tmpCode.'>';
    }

    private function inputEmail()
    {
        $tmpCode = '<input type="email" name="email" placeholder="E-mail" ';
        if($this->rememberData != null)
        {
            $tmpCode .= 'value="'.$this->rememberData->getEmail().'"';
        }
        $tmpCode .= '>';

        if(isset($_SESSION['errorEmail']))
        {
            $tmpCode = $tmpCode.$_SESSION['errorEmail'];
            unset($_SESSION['errorEmail']);
        }
        return $tmpCode;
    }

    private function inputDignity()
    {
        $tmpCode = '<input type="text" name="dignity" placeholder="Godność" ';
        if($this->rememberData != null)
        {
            $tmpCode .= 'value="'.$this->rememberData->getDignity().'"';
        }
        return $tmpCode.'>';
    }

    private function inputRule()
    {
        $tmpCode = '<label><input type="checkbox" name="rule" ';
        if($this->rememberData != null)
        {
            $tmpCode .= 'checked';
        }
        $tmpCode .= '><a href="regulamin.pdf" target="_blank">Akceptuje regulamin</a></label>';
        if(isset($_SESSION['errorRule']))
        {
            $tmpCode = $tmpCode.$_SESSION['errorRule'];
            unset($_SESSION['errorRule']);
        }
        return $tmpCode;
    }
}