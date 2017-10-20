<?php
    session_start();
    if(!isset($_SESSION['user']))
    {
        header('Location: index.php');
        exit();
    }

    require_once "User.php";
    $user = unserialize($_SESSION['user']);

    if(isset($_POST['oldPass']))
    {
        require_once "CheckUpdatePass.php";
        $validate = new CheckUpdatePass($user->getId());

        if($validate->checkData($_POST['oldPass'], $_POST['newPass'], $_POST['repeatNewPass']))
        {
            $pass = password_hash($_POST['newPass'], PASSWORD_DEFAULT);
            require_once "Base.php";
            require_once "Update.php";
            $base = new Update();

            $base->query('User', "IdUser=".$user->getId(), "Pass='$pass'");
            $_SESSION['goodUpdatePass'] = 'Hasło zostało poprawnie zmienione';
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edycja hasła użytkownika</title>

        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/register.css">
        <link rel="stylesheet" href="css/menu.css">
    </head>
    <body>
        <div id="conteiner">
            <form method="post" action="#">
                <?php
                    if(isset($_SESSION['goodUpdatePass']))
                    {
                        echo $_SESSION['goodUpdatePass'];
                        unset($_SESSION['goodUpdatePass']);
                    }
                ?>
                <input type="password" name="oldPass" placeholder="Obecne hasło">
                <?php
                    if(isset($_SESSION['errorOldPass']))
                    {
                        echo $_SESSION['errorOldPass'];
                        unset($_SESSION['errorOldPass']);
                    }
                ?>
                <input type="password" name="newPass" placeholder="Nowe hasło">
                <?php
                    if(isset($_SESSION['errorPass']))
                    {
                        echo $_SESSION['errorPass'];
                        unset($_SESSION['errorPass']);
                    }
                ?>
                <input type="password" name="repeatNewPass" placeholder="Powtórz hasło">
                <input type="submit" value="Zmień hasło">
            </form>
        </div>
        <?php
            require_once "Menu.php";
            $menu = new Menu();

            echo $menu->genereteHeader();
        ?>
    </body>
</html>