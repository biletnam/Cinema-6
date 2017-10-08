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