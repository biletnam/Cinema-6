<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 10/2/17
 * Time: 5:23 PM
 */

class Menu
{
    private $menu;

    public function __construct()
    {
        require_once "ListHtml.php";
        $this->menu = new ListHtml('ol');
    }

    public function genereteHeader()
    {
        require_once 'User.php';
        require_once "Employee.php";

        $tmpUser = unserialize($_SESSION['user']);
        $this->menu->elementList('Witaj ' . $tmpUser->getDignity() . '!' . $this->subMenu(get_class($tmpUser)));
        return '<div id="menuHead">' . $this->menu->getList() . '</div>';
    }

    private function subMenu($nameClass)
    {
        $tmpMenu = new ListHtml('ul');
        $tmpMenu->elementList('<a href="historyReservation.php">Lista rezerwacji</a>');
        $tmpMenu->elementList('<a href="setUser.php">Zmień dane</a>');
        $tmpMenu->elementList('<a href="setPass.php">Zmień hasło</a>');
        $tmpMenu->elementList($this->employeeTask($nameClass, '<a href="addEmployee.php">Dodaj pracownika</a>'));
        $tmpMenu->elementList($this->employeeTask($nameClass, '<a href="addTypeFilm.php">Dodaj gatunek</a>'));
        $tmpMenu->elementList($this->employeeTask($nameClass, '<a href="addDirectory.php">Dodaj reżysera</a>'));
        $tmpMenu->elementList('<a href="disconnect.php">Wyloguj się</a>');

        return $tmpMenu->getList();
    }

    private function employeeTask($nameClass, $value)
    {
        if ($nameClass == 'Employee')
        {
            return $value;
        }
    }
}