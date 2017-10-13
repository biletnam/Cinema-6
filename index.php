<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Cinema</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/seance.css">
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/menu.css">
        <link rel="stylesheet" href="fontello/css/fontello.css">
    </head>
    <body>
        <div id="cointerner">
            <?php
                echo '<div id="cointernerSeance">';
                session_start();
                if(isset($_SESSION['goodSeat']))
                {
                    echo $_SESSION['goodSeat'];
                    unset($_SESSION['goodSeat']);
                }
                require_once "Roster.php";
                require_once "ListSeance.php";
                require_once "Seance.php";
                $listSeance = new ListSeance();

                $tmpPage = null;
                if(isset($_GET['page']))
                {
                    $tmpPage = $_GET['page'];
                    $listSeance->setList($tmpPage);
                }
                else
                {
                    $listSeance->setList();
                }
                foreach ($listSeance->getList() as $item)
                {
                    echo $item;
                }

                if($listSeance->getCountRows() > 10)
                {
                    require_once "ButtonPage.php";
                    $button = new ButtonPage();
                    $button->getButton($listSeance->getCountRows(), $tmpPage);
                }
                echo '</div>';
                if(isset($_SESSION['user']))
                {
                    require_once "Menu.php";

                    $menu = new Menu();
                    echo $menu->genereteHeader();
                }
                else
                {
                    require_once "GenereteForm.php";
                    $form = new GenereteForm();
                    echo $form->generateForm();
                }
            ?>
            <div style="clear:both;"></div>
        </div>
        <script type="text/javascript" src="script/focusChoseSeance.js"></script>
        <script type="text/javascript" src="script/sendChoseSeat.js"></script>
    </body>
</html>
