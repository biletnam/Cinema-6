<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 10/2/17
 * Time: 8:30 PM
 */
    session_start();
    session_unset();

    header('Location: index.php');
?>