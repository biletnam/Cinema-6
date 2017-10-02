<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 9/30/17
 * Time: 9:45 PM
 */

class GenereteFormLogin
{
    public function generateFormLogin()
    {
        return '<div id="formLogin"><form method="post" action="log_in.php">'.$this->inputLogin().$this->inputPassword()
            .$this->inputSubmit().$this->inputError().'</form></div>';
    }

    private function inputLogin()
    {
        return '<input type="text" name="login" placeholder="login">';
    }

    private function inputPassword()
    {
        return '<input type="password" name="pass" placeholder="hasło">';
    }

    private function inputSubmit()
    {
        return '<input type="submit" value="Zalguj się">';
    }

    private function inputError()
    {
        session_start();
        if (isset($_SESSION['error_log']))
        {
            $tmp = $_SESSION['error_log'];
            unset($_SESSION['error_log']);
            return $tmp;
        }
    }
}
?>