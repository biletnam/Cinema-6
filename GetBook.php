<?php
    session_start();
    if(!isset($_SESSION['idSeance']))
    {
        header('location: index.php');
        exit();
    }

    if ((empty($_POST['seatSit'])) & (!isset($_SESSION['seatSit'])))
    {
        header('Location: choseSeat.php?idSeance='.$_SESSION['idSeance']);
        exit();
    }else if(isset($_POST['seatSit']))
    {
        $_SESSION['seatSit'] = $_POST['seatSit'];
    }

    require_once "RememberUserData.php";

    if(isset($_SESSION['user']))
    {
        require_once "User.php";
        require_once "Employee.php";
        $user = unserialize($_SESSION['user']);
        require_once "CheckSeat.php";
        $book = new CheckSeat();

        $book->addReservation($_SESSION['idSeance'], $user->getId(),$_SESSION['seatSit']);
    }

    if(isset($_POST['email']))
    {
        require_once "Validate.php";
        require_once "ValidateEmail.php";
        $checkEmail = new ValidateEmail();
        $email = $_POST['email'];

        if($checkEmail->validateData($email))
        {
            require_once "AddUser.php";
            require_once "Base.php";
            require_once "Select.php";
            require_once "CheckSeat.php";
            $user = new AddUser($email, $_POST['dignity']);
            $book = new CheckSeat();
            $tmpBase = new Select();

            $user->add();
            $query = $tmpBase->query("User", "Email = '$email'", 'IdUser');
            $line = $query->fetch_assoc();
            $tmpBase->closeBase();
            $book->addReservation($_SESSION['idSeance'], $line['IdUser'], $_SESSION['seatSit']);

            unset($_SESSION['seatSit']);
        }
        else
        {
            $tmpData = new RememberUserData(null, null, null, $email, $_POST['dignity'], null);
            $_SESSION['rememberUserData'] = serialize($tmpData);
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Podaj dane</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/register.css">
    </head>
    <body>
        <div id="conteiner">
            <?php
                echo "<div>Wybrałeś miejsca: ";
                foreach ($_SESSION['seatSit'] as $item)
                {
                    echo $item. ' ';
                }
                echo '</div><div>Podaj dane potrzebne do rezerwacji.</div>';
                echo '<form action="#" method="post" id="formBook">
                    <div class="input"><input type="text" name="email" placeholder="email" ';
                if(isset($_SESSION['rememberUserData']))
                {
                    $tmp = unserialize($_SESSION['rememberUserData']);
                    echo 'value="'.$tmp->getEmail().'"';
                }
                echo '>';
                if(isset($_SESSION['errorEmail']))
                {
                    echo $_SESSION['errorEmail'];
                    unset($_SESSION['errorEmail']);
                }
                echo '</div><div class="input"><input type="text" name="dignity" placeholder="Godność" ';
                if(isset($_SESSION['rememberUserData']))
                {
                    $tmp = unserialize($_SESSION['rememberUserData']);
                    echo 'value="'.$tmp->getDignity().'"';
                }
                echo'></div><input type="submit" value="Zarezerwuj"></form>';
            ?>
        </div>
    </body>
</html>