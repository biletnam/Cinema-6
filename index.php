<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Cinema</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/seance.css">
    </head>
    <body>
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
            $listSeance->setList();

            foreach ($listSeance->getList() as $item)
            {
                echo $item;
            }

        ?>
        <script type="text/javascript" src="script/focusChoseSeance.js"></script>
    </body>
</html>