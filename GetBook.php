<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 13.09.17
 * Time: 19:40
 */
    if(!isset($_POST['seatSit']))
    {
        header('location: index.php');
        exit();
    }

    require_once "CheckSeat.php";
    $book = new CheckSeat();
    $book->addReservation(1, 2, $_POST['seatSit']);

    unset($_POST['seatSit']);
?>