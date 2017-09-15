<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Cinema</title>
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
                require_once "Book/Room.php";

                $block = array(5, 13);
                $roomCinema = new Room();
                $roomCinema->generateVertical();
                $roomCinema->generateHorizontal();

                foreach ($roomCinema->getListVertical() as $y)
                {
                    $column = '<div style="background-color: #FFFFFF" class="seat">'.$y.'</div>';
                    echo $column;
                    foreach ($roomCinema->getListHorizontal() as $x)
                    {
                        foreach ($block as $z)
                        {
                            if($x == $z)
                            {
                                echo '<div style="background-color: #FFFFFF;" class="seat"></div>';
                            }
                        }
                        $tmp = $y.$x;
                        echo '<label class="seat" for="'.$tmp.'" onclick="changeColorSeatSit(this);">'.$x.'</label><input type="radio" name="seatSit" id="'.$tmp.'" value="'
                            .$tmp.'">';
                    }
                    echo $column.'<div style="clear: both;"></div>';
                }
            ?>
            <input type="submit" value="Rezerwacja">
        </form>
        <script type="text/javascript" src="script/changeColorReservation.js"></script>
    </body>
</html>