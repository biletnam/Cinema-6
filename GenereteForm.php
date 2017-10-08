<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 9/30/17
 * Time: 9:45 PM
 */

class GenereteForm
{
    public function generateForm()
    {
        return '<div id="formLogin"><form method="post" action="log_in.php">'.$this->inputLogin().$this->inputPassword().
            $this->conteinerButton("Zaloguj się").$this->inputError().'</form></div>';
    }

    protected function inputLogin()
    {
        return '<input type="text" name="login" placeholder="Login">';
    }

    protected function inputPassword()
    {
        return '<input type="password" name="pass" placeholder="Hasło">';
    }

    private function conteinerButton($value)
    {
        return '<div id="conteinerButton">'.$this->inputSubmit($value).$this->registerButton().'</div>';
    }

    protected function inputSubmit($value)
    {
        return '<input type="submit" value="'.$value.'">';
    }

    private function registerButton()
    {
        return '<a href="register.php"><input type="button" value="Zarejestruj"></a>';
    }

    private function inputError()
    {
        if (isset($_SESSION['error_log']))
        {
            $tmp = $_SESSION['error_log'];
            unset($_SESSION['error_log']);
            return $tmp;
        }
    }
}
?>