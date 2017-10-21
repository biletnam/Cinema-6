<?php
    session_start();
    if(isset($_POST['login']))
    {
        require_once 'User.php';
        require_once 'Employee.php';
        $user = unserialize($_SESSION['user']);

        if(get_class($user) == 'Employee')
        {
            require_once 'CheckDataForRegister.php';
            $check = new CheckDataForRegister();
            $rule = null;
            if(isset($_POST['rule']))
            {
                $rule = $_POST['rule'];
            }
            if($check->check($_POST['login'], $_POST['pass'], $_POST['repeatPass'], $_POST['email'], $rule))
            {
                require_once "AddUser.php";
                require_once "RegisterUser.php";
                $register = new RegisterUser($_POST['login'], $_POST['pass'], $_POST['email'], $_POST['dignity']);

                $register->add(1);
                $_SESSION['goodSeat'] = 'Nowy pracownik właśnie dołaczył do zespołu';
                header('Location: index.php');
            }
            else
            {
                require_once "RememberUserData.php";
                $tmpData = new RememberUserData($_POST['login'], $_POST['pass'], $_POST['repeatPass'], $_POST['email'],
                    $_POST['dignity'], $rule);
                $_SESSION['rememberData'] = serialize($tmpData);
            }
        }
        else
        {
            header('Location: index.php');
            exit();
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Dodaj pracownika</title>

        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/register.css">
    </head>
    <body>
        <?php
            require_once "GenereteForm.php";
            require_once "GenereteRegister.php";

            $formEployee = new GenereteRegister();
            echo $formEployee->generateForm();
        ?>
    </body>
</html>