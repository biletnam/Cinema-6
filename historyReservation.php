<?php
    session_start();
    if(!isset($_SESSION['user']))
    {
        header('Location: index.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lista rezerwacji</title>

        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/history.css">
        <link rel="stylesheet" href="css/menu.css">
    </head>
    <body>
        <?php
            require_once "Roster.php";
            require_once "HistoryReservation.php";
            require_once "Menu.php";
            $list = new HistoryReservation();
            $menu = new Menu();

            echo '<div id="cointernerSeance">';
            $list->setList();
            foreach ($list->getList() as $item)
            {
                echo $item;
            }

        if($list->getRowsCount() > 20)
        {
            require_once "ButtonPage.php";
            $button = new ButtonPage();
            $button->getButton($listSeance->getCountRows(), $tmpPage);
        }
        echo '</div>'.$menu->genereteHeader();
        ?>
        <div style="clear: both;"></div>
    </body>
</html>