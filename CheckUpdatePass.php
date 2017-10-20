<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 19.10.17
 * Time: 21:22
 */

class CheckUpdatePass
{
    private $idUser = null;

    public function __construct($idUser)
    {
        $this->idUser = $idUser;
    }

    public function checkData($oldPass, $newPass, $repeatpass)
    {
        require_once "Validate.php";
        $flags = true;

        if($this->checkOldPass($oldPass))
        {
            $flags = false;
        }
        if(!$this->checkPasswod($newPass, $repeatpass))
        {
            $flags = false;
        }

        return $flags;
    }

    private function checkOldPass($oldPass)
    {
        require_once "ValidateOldPass.php";
        $validateOldPass = new ValidateOldPass($this->idUser);

        return $validateOldPass->validateData($oldPass);
    }

    private function checkPasswod($pass, $repeat)
    {
        require_once "ValidatePassword.php";
        $validatePass = new ValidatePassword($repeat);

        return $validatePass->validateData($pass);
    }
}
?>