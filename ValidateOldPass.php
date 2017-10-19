<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 17.10.17
 * Time: 10:48
 */

class ValidateOldPass extends Validate
{
    private $idUser = null;

    public function __construct($idUser)
    {
        $this->idUser = $idUser;
    }

    protected function checkData($data)
    {
        if($this->checkPass($data))
        {
            return false;
        }
        else
        {
            $_SESSION['errorOldPass'] = 'Obecne hasło jest błędne';
            return true;
        }
    }

    private function checkPass($pass)
    {
        return password_verify($pass, $this->getNowPass());
    }

    private function getNowPass()
    {
        require_once "Base.php";
        require_once "Select.php";
        $base = new Select();

        $query = $base->query('User', "IdUser=$this->idUser", 'Pass');
        $row = $query->fetch_row();
        $base->closeBase();
        $query->free_result();
        return $row[0];
    }
}
?>