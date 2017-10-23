<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 22.10.17
 * Time: 20:55
 */

class ValidateTypeFilm extends Validate
{
    protected function checkData($data)
    {
        return ($this->uniqueTypeFilm($data) & ($this->lengthNameTypeFilm($data)));
    }

    private function uniqueTypeFilm($typeFilm)
    {
        require_once 'Base.php';
        require_once 'Select.php';
        $base = new Select();
        $flags = true;

        $query = $base->query('TypeFilm', "NameTypeFilm='$typeFilm'", 'IdTypeFilm');

        if($query->num_rows > 0)
        {
            $flags = false;
            $_SESSION['errorTypeFilm'] = 'Taki gatunek filmowy już istnieje';
        }

        $query->free_result();
        $base->closeBase();
        return $flags;
    }

    private function lengthNameTypeFilm($typeFilm)
    {
        if(strlen($typeFilm) < 3)
        {
            $_SESSION['errorTypeFilm'] = 'Nazwa gatunku filmowego powinna być dłuższa';
            return false;
        }
        return true;
    }
}
?>