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
        $this->menu->elementList('Witaj '.$tmpUser->getDignity().'!'.$this->subMenu());
        return '<div id="menuHead">'.$this->menu->getList().'</div>';
    }

    private function subMenu()
    {
        $tmpMenu = new ListHtml('ul');
        $tmpMenu->elementList('<a href="historyReservation.php">Lista rezerwacji</a>');
        $tmpMenu->elementList('<a href="setUser.php">Zmień dane</a>');
        $tmpMenu->elementList('<a href="setPass.php">Zmień hasło</a>');
        $tmpMenu->elementList('<a href="disconnect.php">Wyloguj się</a>');

        return $tmpMenu->getList();
    }
}