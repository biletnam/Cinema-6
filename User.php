<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 10/1/17
 * Time: 4:41 PM
 */

class User
{
    private $id;
    private $nick;
    private $password;
    private $email;
    private $dignity;

    public function __construct($row)
    {
        $this->id = $row['IdUser'];
        $this->nick = $row['Login'];
        $this->password = $row['Pass'];
        $this->email = $row['Email'];
        $this->dignity = $row['NameSurname'];
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
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

    public function updateUser($email, $dignity)
    {
        $this->email = $email;
        $this->dignity = $dignity;
    }
}