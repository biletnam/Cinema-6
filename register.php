<?php
    if(isset($_POST['login']))
    {
        require_once "CheckDataForRegister.php";
        $check = new CheckDataForRegister();
        $rule = 'c';
        if(isset($_POST['rule']))
        {
            $rule = $_POST['rule'];
        }
        if($check->check($_POST['login'], $_POST['pass'], $_POST['repeatPass'], $_POST['email'], $rule))
        {
            header('Location: cos.php');
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