<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Обратная связь</title>
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
    ?>

</head>
<body>
<?php
include "header.php";
?>
<div class="container obr_svyaz">
    <form class="row justify-content-center" method="post">
        <h2>Форма Обратной связи</h2>
        <div class="mb-3 col-12 col-md-4">
            <label class="form-label">Тема Письма</label>
            <input name='theme' type="text" class="form-control" placeholder="Введите тему письма">
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Введите ваш email">
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label class="form=label">Ваше сообщение</label>
            <textarea class="form-control" name="msg" placeholder="Введите ваше сообщение" maxlength="200"></textarea>
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4 btn-reg">
            <button type="submit" name='send' class="btn btn-primary">Отправить</button>
        </div>
    </form>
    <?php
    if(isset($_POST['send'])){
        mail($_POST['email'], $_POST['theme'], $_POST['msg'], 'From: aakoval01@gmail.com');
        echo "<center><strong><i>Вам отправлено письмо!</i></strong></center><br>";
        header('Refresh: 1.5; URL = svaz.php');

    }
    ?>
</div>
<?php
include "footer.php";
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>
