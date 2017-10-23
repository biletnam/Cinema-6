<?php
    session_start();
    try
    {
        if(!isset($_SESSION['user']))
        {
            throw new Exception();
        }

        require_once 'User.php';
        require_once 'Employee.php';
        $user = unserialize($_SESSION['user']);

        if(get_class($user) != 'Employee')
        {
            throw new Exception();
        }


    }catch(Exception $exception)
    {
        header('Location: index.php');
        exit();
    }

    if(isset($_POST['typeFilm']))
    {
        require_once 'Validate.php';
        require_once 'ValidateTypeFilm.php';
        $validate = new ValidateTypeFilm();
        $typeFilm = strtolower($_POST['typeFilm']);

        if($validate->validateData($typeFilm))
        {
            require_once "Base.php";
            require_once "Insert.php";
            $base = new Insert();

            $base->query('TypeFilm', 'NameTypeFilm', "'$typeFilm'");
            unset($_SESSION['typeFilm']);
            $_SESSION['goodSeat'] = 'Poprawne dodanie gatunku filmowego';
            header('Location: index.php');
        }
        else
        {
            $_SESSION['typeFilm'] = $_POST['typeFilm'];
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Dodaj reżysera</title>

        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/register.css">
        <link rel="stylesheet" href="css/menu.css">
    </head>
    <body>
        <div id="conteiner">
            <form method="post" action="#">
                <input type="text" name="typeFilm" placeholder="Godność reżysera" value="<?php
                    if (isset($_SESSION['typeFilm']))
                    {
                        echo $_SESSION['typeFilm'];
                        unset($_SESSION['typeFilm']);
                    }
                 ?>">
                <?php
                    if(isset($_SESSION['errorTypeFilm']))
                    {
                        echo $_SESSION['errorTypeFilm'];
                        unset($_SESSION['errorTypeFilm']);
                    }
                ?>
                <input type="submit" value="Dodaj reżysera">
            </form>
        </div>
        <?php
            require_once "Menu.php";
            $menu = new Menu();

            echo $menu->genereteHeader();
        ?>
    </body>
</html>