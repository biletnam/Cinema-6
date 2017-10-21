<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 08.10.17
 * Time: 18:44
 */

class GenereteRegister extends GenereteForm
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

    protected function errorPassword()
    {
        $tmpCode = '';
        if(isset($_SESSION['errorPass']))
        {
            $tmpCode = $_SESSION['errorPass'];
            unset($_SESSION['errorPass']);
        }
        return $tmpCode;
    }

    protected function inputRepeatPassowrd()
    {
        $tmpCode = '<input type="password" name="repeatPass" placeholder="Powtórz hasło" ';
        if($this->rememberData != null)
        {
            $tmpCode .= 'value="'.$this->rememberData->getRepeatPass().'"';
        }
        return $tmpCode.'>';
    }

    protected function inputEmail()
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

    protected function inputDignity()
    {
        $tmpCode = '<input type="text" name="dignity" placeholder="Godność" ';
        if($this->rememberData != null)
        {
            $tmpCode .= 'value="'.$this->rememberData->getDignity().'"';
        }
        return $tmpCode.'>';
    }

    protected function inputRule()
    {
        $tmpCode = '<label><input type="checkbox" name="rule" ';
        if($this->rememberData != null)
        {
            if($this->rememberData->getRule() == 'on')
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