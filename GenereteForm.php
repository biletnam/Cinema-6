<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 9/30/17
 * Time: 9:45 PM
 */

class GenereteForm
{
    protected $rememberData = null;

    public function __construct()
    {
        if (isset($_SESSION['rememberData']))
        {
            require_once "RememberUserData.php";
            $this->rememberData = unserialize($_SESSION['rememberData']);
        }
    }

    public function generateForm()
    {
        return '<div id="formLogin"><form method="post" action="log_in.php">'.$this->inputLogin().$this->inputPassword().
            $this->conteinerButton("Zaloguj się").$this->inputError().'</form></div>';
    }

    protected function inputLogin()
    {
        $tmpCode = '<input type="text" name="login" placeholder="Login" ';
        if($this->rememberData != null)
        {
            $tmpCode = $tmpCode.'value="'.$this->rememberData->getLogin().'"';
        }

        return $tmpCode.'>';
    }

    protected function inputPassword()
    {
        $tmpCode = '<input type="password" name="pass" placeholder="Hasło" ';
        if($this->rememberData != null)
        {
            $tmpCode .= 'value="'.$this->rememberData->getPass().'"';
        }
        return $tmpCode.'>';
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