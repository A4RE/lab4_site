<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Вход</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link href="assets/css/style.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <?php
    include "connect.php";
    session_start();
    unset($_SESSION['message']);
    if(isset($_POST['auth'])){
        auth($_POST['login'], $_POST['pass']);
    }
    ?>

</head>
<body>
<!--Header-->
<?php
include "header.php";
?>
<!--Main section-->
<div class="container reg_form">
    <form class="row justify-content-center" method="post">
        <h2>Форма Входа</h2>
        <div class="mb-3 col-12 col-md-4">
            <label for="formGroupExampleInput1" class="form-label">Логин</label>
            <input name="login" type="text" class="form-control" id="formGroupExampleInput1" placeholder="Введите ваш Логин">
            <span id="valid_login_message" class="mesage_error"></span>
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input name="pass" type="password" class="form-control" id="exampleInputPassword1" placeholder="Введите пароль">
            <span id="valid_pass_message" class="mesage_error"></span>
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4 btn-reg">
            <button name='auth' type="submit" class="btn btn-primary">Войти</button>
            <p>Еще нет аккаунта? <a href="reg.php">Зарегистрироваться</a></p>
        </div>
    </form>
</div>
<?php
echo $_SESSION['message'];
?>

<!--Footer-->
<?php
include "footer.php";
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>
<?php
function clear($string)
{
    $string = trim($string);
    $string = stripslashes($string);
    $string = strip_tags($string);
    $string = htmlspecialchars($string);
    return $string;
}

function chechSize($string, $min, $max){
    $result = (mb_strlen($string) > $min && mb_strlen($string) <= $max);
    return $result;

}
function auth($login, $pass)
{
    include "connect.php";
    session_start();
    $login = mysqli_real_escape_string($conn, $login);
    $pass = mysqli_real_escape_string($conn, $pass);

    $quer = 'SELECT COUNT(*) FROM user WHERE `Логин` LIKE \''.$login.'\'' ;
    $checkUsers = mysqli_query($conn,$quer)or die("Ошибка авторизации" . mysqli_error($conn));
    $row = mysqli_fetch_row($checkUsers);
    if($row[0] > 0)
    {
        $quer = 'SELECT * FROM user WHERE `Логин` LIKE \''.$login.'\'' ;
        $user = mysqli_query($conn,$quer) or die("Ошибка " . mysqli_error($conn));
        $users = mysqli_fetch_assoc($user);
        if(($users['Пароль'] == clear($pass)))
        {
            $_SESSION['login'] = $login;
            $_SESSION['pass'] = $pass;
            $_SESSION['id'] = $users['id_пользователя'];

            $_SESSION['message'] = '<center><strong><i>Здравстуйте, '.$login.'</i></strong></center>';
            header('Refresh: 1; URL = lk.php');
        }
        else
        {
            $_SESSION['message'] = '<center><strong><i>Был введен неверный пароль</i></strong></center>';
            header('Refresh: 1; URL = login.php');
        }
    }
    else
    {
        $_SESSION['message'] = '<center><strong><i>Пользователь не найден</i></strong></center>';
        header('Refresh: 1; URL = login.php');
    }

}