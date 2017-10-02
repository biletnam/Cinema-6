<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 10/1/17
 * Time: 4:41 PM
 */

abstract class Person
{
    private $nick;
    private $password;
    private $email;
    private $dignity;

    protected function __construct($row)
    {
        $this->nick = $row['Login'];
        $this->password = $row['Pass'];
        $this->email = $row['E-mail'];
        $this->dignity = $row['NameSurname'];
    }

    /**
     * @return mixed
     */
    public function getNick()
    {
        return $this->nick;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getDignity()
    {
        return $this->dignity;
    }
}