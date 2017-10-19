<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 10/3/17
 * Time: 5:57 PM
 */

class ValidateEmail extends Validate
{
    private $id = null;

    public function __construct($id = 0)
    {
            $this->id = $id;
    }

    protected function checkData($data)
    {
        if(($this->ErrorEmail($data)) | ($this->noUniqueEmail($data)))
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    private function ErrorEmail($email)
    {
        $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
        if((filter_var($emailB, FILTER_VALIDATE_EMAIL) == false) | ($email != $emailB))
        {
            $_SESSION['errorEmail'] = 'Podany e-mail jest błędny!';

            return true;
        }
    }

    private function noUniqueEmail($email)
    {
        require_once "Base.php";
        require_once "Select.php";
        $base = new Select();
        $flags = false;

        $query = $base->query("User", "Email = '$email' AND IdUser != $this->id", 'Email');

        if($query->num_rows > 0)
        {
            $_SESSION['errorEmail'] = 'Taki e-mail istnieje.';
            $flags = true;
        }

        $query->free_result();
        $base->closeBase();
        return $flags;
    }
}
?>