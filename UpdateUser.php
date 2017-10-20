<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 19.10.17
 * Time: 10:16
 */

class UpdateUser
{
    private $email = null;
    private $dignity = null;

    public function __construct($email, $dignity)
    {
        $this->email = $email;
        $this->dignity = $dignity;
    }

    public function updateBase($idUser)
    {
        require_once "Base.php";
        require_once "Update.php";

        $update = new Update();
        $update->query('User', "IdUser=$idUser", "Email='$this->email', NameSurname='$this->dignity'");
        $this->changeUser();

        $update->closeBase();
        $_SESSION['goodUpdate'] = 'Udana edycja danych';

        header('Location: setUser.php');
        exit();
    }

    private function changeUser()
    {
        require_once "User.php";
        require_once "Employee.php";

        $tmpUser = unserialize($_SESSION['user']);
        $tmpUser->updateUser($this->email, $this->dignity);

        $_SESSION['user'] = serialize($tmpUser);
    }
}
?>