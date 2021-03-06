<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 10.10.17
 * Time: 10:11
 */

class RegisterUser extends AddUser
{
    private $login;
    private $pass;
    public function __construct($login, $pass, $email, $dignity)
    {
        parent::__construct($email, $dignity);
        $this->login = $login;
        $this->pass = $this->hashPass($pass);
    }

    private function hashPass($pass)
    {
        return password_hash($pass, PASSWORD_DEFAULT);
    }

    public function add($part = 0)
    {
        require_once "Base.php";
        require_once "Insert.php";
        $base = new Insert();

        $base->query('User', 'Login, Pass, Email, NameSurname, Part',
            "'$this->login', '$this->pass', '$this->email', '$this->dignity', $part");

        $this->cleanRememberData();

        $base->closeBase();
    }

    private function cleanRememberData()
    {
        if(isset($_SESSION['rememberData']))
        {
            unset($_SESSION['rememberData']);
        }
    }
}
?>