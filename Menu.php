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
        session_start();
        require_once "ListHtml.php";
        $this->menu = new ListHtml('ol');
    }

    public function genereteHeader()
    {
        require_once 'Person.php';
        require_once 'User.php';

        $tmpUser = unserialize($_SESSION['user']);
        $this->menu->elementList('Witaj '.$tmpUser->getDignity().'!'.$this->subMenu());
        return $this->menu->getList();
    }

    private function subMenu()
    {
        $tmpMenu = new ListHtml('ul');
        $tmpMenu->elementList('<a href="disconnect.php">Wyloguj się</a>');

        return $tmpMenu->getList();
    }
}