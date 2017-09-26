<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 13.09.17
 * Time: 19:40
 */
    session_start();
    if((!isset($_POST['seatSit'])) | (!isset($_SESSION['idSeance'])))
    {
        header('location: choseSeat.php');
        exit();
    }

    require_once "CheckSeat.php";
    $book = new CheckSeat();
    $book->addReservation($_SESSION['idSeance'], 2, $_POST['seatSit']);

    unset($_POST['seatSit']);
?>