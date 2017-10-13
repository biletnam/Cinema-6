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
        <link rel="stylesheet" href="fontello/css/fontello.css">
    </head>
    <body>
        <?php
            require_once "Roster.php";
            require_once "HistoryReservation.php";
            require_once "Menu.php";
            $list = new HistoryReservation();
            $menu = new Menu();

            $tmpPage = null;
            if(isset($_GET['page']))
            {
                $tmpPage = $_GET['page'];
                $list->setList($tmpPage);
            }
            else
            {
                $list->setList();
            }

            echo '<div id="cointernerSeance">';
            foreach ($list->getList() as $item)
            {
                echo $item;
            }

            if($list->getCountRows() > 20)
            {
                require_once "ButtonPage.php";
                $button = new ButtonPage(20);
                $button->getButton($list->getCountRows(), $tmpPage);
            }

            echo '</div>'.$menu->genereteHeader();
        ?>
        <div style="clear: both;"></div>
    </body>
</html>