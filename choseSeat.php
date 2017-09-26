<?php
    session_start();
    if(!isset($_POST['idSeance']))
    {
        header('Location: index.php');
        exit();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Rezerwacja biletu - Cinema</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <form method="post" action="GetBook.php">
            <?php
            /**
             * Created by PhpStorm.
             * User: marek
             * Date: 12.09.17
             * Time: 19:39
             */

            require_once "Room.php";
            require_once "Roster.php";
            require_once "ListReservation.php";
            $_SESSION['idSeance'] = $_POST['idSeance'];
            $block = array(5, 13);
            $roomCinema = new Room();
            $roomCinema->generateVertical();
            $roomCinema->generateHorizontal();
            $list = new ListReservation($_SESSION['idSeance']);
            unset($_POST['idSeance']);

            $list->setList();

            foreach ($roomCinema->getListVertical() as $y)
            {
                $column = '<div style="background-color: #FFFFFF" class="seat">' . $y . '</div>';
                echo $column;
                foreach ($roomCinema->getListHorizontal() as $x)
                {
                    foreach ($block as $z)
                    {
                        if ($x == $z)
                        {
                            echo '<div style="background-color: #FFFFFF;" class="seat"></div>';
                        }
                    }
                    $tmp = $y . $x;
                    $free = 'onclick="changeColorSeatSit(this);"';
                    $disabled = "";
                    foreach ($list->getList() as $seat)
                    {
                        if ($tmp == $seat)
                        {
                            $free = 'style="background-color: #FF0000; cursor: default;"';
                            $disabled = "disabled";
                        }
                    }
                    echo '<label class="seat" ' . $free . ' for="' . $tmp . '">'
                        . $x . '</label><input type="radio" name="seatSit" id="' . $tmp . '" value="' .$tmp
                        .'" ' . $disabled . '>';
                }
                echo $column . '<div style="clear: both;"></div>';
            }
             ?>
        <input type="submit" value="Rezerwacja">
        </form>
        <?php
        if(isset($_SESSION['errorSeat']))
        {
            echo $_SESSION['errorSeat'];
            unset($_SESSION['errorSeat']);
        }
        ?>
        <script type="text/javascript" src="script/changeColorReservation.js"></script>
        <script type="text/javascript" src="script/focusChoseSeance.js"></script>
    </body>
</html>