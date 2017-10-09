<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 10/4/17
 * Time: 5:10 PM
 */

class AddUser
{
    protected $email;
    protected $dignity;

    public function __construct($email, $dignity)
    {
        $this->email = $email;
        $this->dignity = $dignity;
    }

    public function add()
    {
        require_once "Base.php";
        require_once "Insert.php";
        $base = new Insert();

        $base->query("User", "Email, NameSurname", "'$this->email', '$this->dignity'");

        $base->closeBase();
    }
}
?>