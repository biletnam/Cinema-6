<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 9/30/17
 * Time: 10:40 PM
 */

class Login
{
    private $login;
    private $pass;
    private $base;

    public function __construct($login, $pass)
    {
        $this->login = $login;
        $this->pass = $pass;
    }

    public function log_in()
    {
        session_start();
        require_once "Base.php";
        require_once "Select.php";
        $this->base = new Select();

        $query = $this->base->query("User","Login = '$this->login' AND Pass = '$this->pass'");
        if($query->num_rows > 0)
        {
            require_once "Person.php";
            require_once "User.php";
            $tmpUser = new User($query->fetch_assoc());
            $_SESSION['user'] = serialize($tmpUser);
        }
        else
        {
            $_SESSION['error_log'] = '<div class="error">Błędny login lub hasło</div>';
        }

        $this->base->closeBase();
        header('Location: index.php');
    }
}
?>