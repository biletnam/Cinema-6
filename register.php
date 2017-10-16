<?php
    if(isset($_POST['login']))
    {
        require_once "CheckDataForRegister.php";
        $check = new CheckDataForRegister();
        $rule = null;
        if(isset($_POST['rule']))
        {
            $rule = $_POST['rule'];
        }
        session_start();
        if($check->check($_POST['login'], $_POST['pass'], $_POST['repeatPass'], $_POST['email'], $rule))
        {
            require_once "AddUser.php";
            require_once "RegisterUser.php";
            $register = new RegisterUser($_POST['login'], $_POST['pass'], $_POST['email'], $_POST['dignity']);

            $register->add();
            header('Location: goodRegister.php');
        }
        else
        {
            require_once "RememberUserData.php";
            $tmpData = new RememberUserData($_POST['login'], $_POST['pass'], $_POST['repeatPass'], $_POST['email'],
                $_POST['dignity'], $rule);
            $_SESSION['rememberData'] = serialize($tmpData);
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Rezerwacja użytkownika</title>
        <link rel="stylesheet" href="css/register.css">
    </head>
    <body>
    <?php
        require_once "GenereteForm.php";
        require_once "GenerteRegister.php";

        $registerCode = new GenerteRegister();
        echo $registerCode->generateForm();
    ?>
    </body>
</html>