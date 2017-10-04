<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 10/3/17
 * Time: 5:43 PM
 */

class NoLogin
{
    private $email;
    private $dignity;

    public function __construct($email, $dignity)
    {

    }

    private function securityData($data)
    {
        require_once "Validate.php";
        require_once "ValidateEmail.php";
        $data = new ValidateEmail();

        if($data->validateData($data))
        {

        }
    }
}
?>