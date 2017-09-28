<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 13.09.17
 * Time: 19:40
 */
    session_start();
    if(!isset($_SESSION['idSeance']))
    {
        header('location: index.php');
        exit();
    }
    if (empty($_POST['seatSit']))
    {
        header('Location: choseSeat.php?idSeance='.$_SESSION['idSeance']);
    }
    require_once "CheckSeat.php";
    $book = new CheckSeat();

    foreach ($_POST['seatSit'] as $item)
    {
        $book->addReservation($_SESSION['idSeance'], 2, $item);
    }
    unset($_POST['seatSit']);

    header('Location: index.php');
?>