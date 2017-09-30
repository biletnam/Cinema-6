<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Cinema</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/seance.css">
        <link rel="stylesheet" href="fontello/css/fontello.css">
    </head>
    <body>
        <div id="cointerner">
            <?php
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
            ?>
        </div>
        <script type="text/javascript" src="script/focusChoseSeance.js"></script>
        <script type="text/javascript" src="script/sendChoseSeat.js"></script>
    </body>
</html>
