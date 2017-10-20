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
        $this->login = $this->securityData($login);
        $this->pass = $pass;
    }

    private function securityData($data)
    {
        return htmlentities($data, ENT_QUOTES, 'UTF-8');
    }

    public function log_in()
    {
        session_start();
        require_once "Base.php";
        require_once "Select.php";
        require_once "User.php";
        $this->base = new Select();

        $query = $this->base->query("User","Login = '$this->login'");
        if($query->num_rows > 0)
        {
            $row = $query->fetch_assoc();
            $tmpUser = $this->checkPart($row);

            if($this->checkHash($row['Pass']))
            {
                $_SESSION['user'] = serialize($tmpUser);
            }
            else
            {
                $_SESSION['error_log'] = '<div class="error">Błędny login  hasło</div>';
            }
        }
        else
        {
            $_SESSION['error_log'] = '<div class="error">Błędny login lub hasło</div>';
        }

        $query->free_result();
        $this->base->closeBase();
        header('Location: index.php');
    }

    private function checkPart($row)
    {
        if($row['Part'] == '1')
        {
            return new User($row);
        }
        else
        {
            return new User($row);
        }
    }

    private function checkHash($passwordHash)
    {
        return password_verify($this->pass, $passwordHash);
    }
}
?>