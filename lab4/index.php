<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Главная</title>
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
<!--Header-->
<?php
include "header.php";
?>

<!--Main block start-->
<div class="container">
    <div class="content row">
        <!--    content-->
        <div class="main-content col-md-8 col-12">
            <h2>Агентства недвижимости</h2>
            <?php
            include "connect.php";
            $result = "Select *, Тип.Название_типа from Агентство INNER JOIN Тип ON (Агентство.Id_тип = Тип.id_типа)";
            $result = mysqli_query($conn, $result) or die("Ошибка запроса Select". mysqli_error($conn));
            while ($row = mysqli_fetch_assoc($result))
            {
                echo '<div class="agency row">
                        <div class="img col-12 col-md-4">
                            <img src="'.$row['Картинка'].'" alt="Логотип агентства" class="img-thumbnail">
                        </div>
                        <div class="agency_text col-12 col-md-8">';
                echo '<h3><a href="single.php?id='.$row['id_агентства'].'">Агентство недвижимости: ' .$row['Название_агентства'].'</a></h3>';
                echo '<p class="preview-text">Тип Агентства: '.$row["Название_типа"].'</p>';
                echo "<i class='bx bx-building'>Главный Офис: ".$row['Гл_офис']."</i><br>";
                echo "<i class='bx bx-phone'>Телефон: ".$row['Телефон_агентства']."</i>";
                echo '</div></div>';
            }
            ?>
        </div>

        <!--    side bar-->
        <div class="sidebar col-md-4 col-12">
            <div class="section search">
                <h3>Поиск</h3>
                <form action="search.php" method="post">
                    <input type="text" name="search-term" class="search-term" placeholder="search">
                    <input type="submit" class="btn-reg" value="Поиск">
                </form>
            </div>
        </div>
    </div>
</div>
<!--Main block end-->

<!--Footer-->
<?php
include 'footer.php';
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>