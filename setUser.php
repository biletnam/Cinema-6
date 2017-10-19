<?php
    session_start();
    if(!isset($_SESSION['user']))
    {
        header('Location: index.php');
        exit();
    }
    require_once "Person.php";
    require_once "User.php";
    $User = unserialize($_SESSION['user']);
    require_once "RememberUserData.php";
    $tmpData = new RememberUserData(null, null,
        null, $User->getEmail(), $User->getDignity(), null);
    $_SESSION['rememberData'] = serialize($tmpData);

    if(isset($_POST['oldPass']))
    {
        require_once "CheckDataForUpdate.php";
        $check = new CheckDataForUpdate($User->getId());
        if($check->check($_POST['email'], $_POST['oldPass']))
        {
            require_once "UpdateUser.php";
            $update = new UpdateUser($_POST['email'], $_POST['dignity']);
            $update->updateBase($User->getId());
        }
        else
        {
            $tmpData = new RememberUserData(null, null,
                null, $_POST['email'], $_POST['dignity'], null);
            $_SESSION['rememberData'] = serialize($tmpData);
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edycja danych użytkownika</title>

        <link rel="stylesheet" href="css/register.css">
    </head>
    <body>
        <?php
            require_once "GenereteForm.php";
            require_once "GenereteRegister.php";
            require_once "GenereteUpdate.php";

            if(isset($_SESSION['goodUpdate']))
            {
                echo $_SESSION['goodUpdate'];
                unset($_SESSION['goodUpdate']);
            }

            $code = new GenereteUpdate();
            echo $code->generateForm();
        ?>
    </body>
</html>