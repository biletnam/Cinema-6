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

    require_once "Book/Booking.php";
    $book = new Booking();
    $book->addReservation($_POST['seatSit']);

    unset($_POST['seatSit']);
?>