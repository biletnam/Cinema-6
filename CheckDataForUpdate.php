<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 18.10.17
 * Time: 21:43
 */

class CheckDataForUpdate
{
    private $idUser = null;

    public function __construct($idUser)
    {
        $this->idUser = $idUser;
    }

    public function check($email, $oldPass)
    {
        require_once "Validate.php";
        $flags = true;

        if(!$this->checkEmail($email))
        {
            $flags = false;
        }
        if($this->checkOldPass($oldPass))
        {
            $flags = false;
        }

        return $flags;
    }

    private function checkEmail($email)
    {
        require_once "ValidateEmail.php";
        $check = new ValidateEmail($this->idUser);

        return $check->validateData($email);
    }

    private function checkOldPass($oldPass)
    {
        require_once "ValidateOldPass.php";
        $check = new ValidateOldPass($this->idUser);

        return $check->validateData($oldPass);
    }
}
?>