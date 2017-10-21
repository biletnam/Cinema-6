<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 15.10.17
 * Time: 20:54
 */

class RememberUserData
{
    private $login = null;
    private $pass = null;
    private $repeatPass = null;
    private $email = null;
    private $dignity = null;
    private $rule = null;

    public function __construct($login, $pass, $repeatPass, $email, $dignity, $rule)
    {
        $this->login = $login;
        $this->pass = $pass;
        $this->repeatPass = $repeatPass;
        $this->email = $email;
        $this->dignity = $dignity;
        $this->rule = $rule;
    }

    /**
     * @return null
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @return null
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @return null
     */
    public function getRepeatPass()
    {
        return $this->repeatPass;
    }

    /**
     * @return null
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return null
     */
    public function getDignity()
    {
        return $this->dignity;
    }

    /**
     * @return null
     */
    public function getRule()
    {
        return $this->rule;
    }
}
?>