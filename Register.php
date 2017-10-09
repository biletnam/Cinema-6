<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 09.10.17
 * Time: 08:23
 */

class Register extends AddUser
{
    private $login;
    private $pass;

    public function __construct($login, $pass, $email, $dignity)
    {
        parent::__construct($email, $dignity);
        $this->login = $login;
        $this->pass = $pass;
    }
}
?>