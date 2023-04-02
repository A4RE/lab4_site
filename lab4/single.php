
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Страница агентства</title>
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
<!--
    HEADER
-->
<?php
include "header.php";
?>
<!--
    MAIN BLOCK
-->
<div class="container">
    <div class="content row">
        <!--    content-->
        <div class="main-content col-md-8 col-12">
            <?php
            include "connect.php";
            $page = $_GET['id'];
            $result = 'Select * from Агентство WHERE id_агентства ='.$page;
            $result = mysqli_query($conn, $result) or die("Ошибка запроса Select". mysqli_error($conn));
            $row = mysqli_fetch_assoc($result);
            echo '<h2>Агентство недвижимости '.$row['Название_агентства'].'</h2>';
            echo '<div class="single_agency row">
                <div class="img col-12 col-md-4">
                    <img src="assets/images/logo_nedv.png" alt="Логотип агентства" class="img-thumbnail">
                </div>';
            echo "<div class='info'>";
            echo "<i class='bx bx-building'>Главный Офис: ".$row['Гл_офис']."</i>";
            echo "<br>";
            echo "<i class='bx bx-phone'>Телефон: ".$row['Телефон_агентства']."</i><br><br>";
            echo '<p class="preview-text">'.$row['Описание'].'</p>';
            echo "</div>";
            ?>
            <div class="single_agency_text col-12">
                <h4>Остальные офисы</h4>
                <?php
                include "connect.php";
                $res = "Select *, Агентство.Название_агентства from Офис INNER JOIN Агентство ON 
                    (Офис.id_агентства = Агентство.id_агентства) WHERE Агентство.id_агентства=".$page;
                $res = mysqli_query($conn, $res) or die("Ошибка запроса Select". mysqli_error($conn));
                while($row = mysqli_fetch_assoc($res)){
                    echo "<i class='bx bx-building' >Адрес Офиса: ".$row['Адрес_офиса']."</i>";
                    echo "<br>";
                    echo "<i class='bx bx-phone'>Телефон: ".$row['Телефон_офиса']."</i>";
                    echo "<br>";
                }
                ?>
            </div>
        </div>
    </div>
</div>
</div>


<!--
    MAIN BLOCK END
-->
<!--FOOTER BLOCK-->
<?php
include "footer.php"
?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>