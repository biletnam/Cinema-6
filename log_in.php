<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 9/30/17
 * Time: 10:27 PM
 */
    if(!isset($_POST['login']))
    {
        header('Location: index.php');
        exit;
    }

    $login = $_POST['login'];
    $pass = $_POST['pass'];

    require_once "Login.php";
    $log_in =  new Login($login, $pass);

    $log_in->log_in();

?>