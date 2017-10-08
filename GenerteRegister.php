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
        return '<div id="conteiner"><form method="post" action="#">'.$this->inputLogin().$this->inputPassword().
            $this->inputRepeatPassowrd().$this->inputEmail().$this->inputRule().$this->inputSubmit("Zarejestruj się").'</form></div>';
    }

    private function inputRepeatPassowrd()
    {
        return '<input type="password" name="repeatPass" placeholder="Powtórz hasło">';
    }

    private function inputEmail()
    {
        return '<input type="email" name="email" placeholder="E-mail">';
    }

    private function inputRule()
    {
        return '<label><input type="checkbox" name="rule"><a href="regulamin.pdf" target="_blank">Akceptuje regulamin</a></label>';
    }
}