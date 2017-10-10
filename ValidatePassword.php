<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 09.10.17
 * Time: 18:02
 */

class ValidatePassword extends Validate
{
    private $repeatPass;

    public function __construct($repeatPass)
    {
        $this->repeatPass = $repeatPass;
    }

    protected function checkData($data)
    {
        if(($this->lengthPassword($data)) | ($this->repeatGoodPass($data)))
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    private function lengthPassword($pass)
    {
        if(strlen($pass) < 8)
        {
            $_SESSION['errorPass'] = 'Hasło powinno zawirać min 8 znaków';
            return true;
        }
    }

    private function repeatGoodPass($pass)
    {
        if($pass != $this->repeatPass)
        {
            $_SESSION['errorPass'] = 'Hasła powinny być takie same.';
            return true;
        }
    }
}
?>