<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Галлерея</title>
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
include 'header.php'
?>
<!--Section gallery start-->
<div class="container gallery">
    <div class="row justify-content-center">
        <h2>Галлерея Фотографий</h2>
        <div class="mb-3 col-12 col-md-4 gallery_card">
            <img src="assets/images/img_gallery/1.jpg" class="gallery_card_item" alt="Фото">
        </div>
        <div class="mb-3 col-12 col-md-4 gallery_card">
            <img src="assets/images/img_gallery/2.jpeg" class="gallery_card_item" alt="Фото">
        </div>
        <div class="mb-3 col-12 col-md-4 gallery_card">
            <img src="assets/images/img_gallery/3.jpeg" class="gallery_card_item" alt="Фото">
        </div>
        <div class="mb-3 col-12 col-md-4 gallery_card">
            <img src="assets/images/img_gallery/4.jpeg" class="gallery_card_item" alt="Фото">
        </div>
        <div class="mb-3 col-12 col-md-4 gallery_card">
            <img src="assets/images/img_gallery/5.jpeg" class="gallery_card_item" alt="Фото">
        </div>
        <div class="mb-3 col-12 col-md-4 gallery_card">
            <img src="assets/images/img_gallery/6.jpeg" class="gallery_card_item" alt="Фото">
        </div>
        <div class="mb-3 col-12 col-md-4 gallery_card">
            <img src="assets/images/img_gallery/7.jpeg" class="gallery_card_item" alt="Фото">
        </div>
        <div class="mb-3 col-12 col-md-4 gallery_card">
            <img src="assets/images/img_gallery/8.png" class="gallery_card_item" alt="Фото">
        </div>
        <div class="mb-3 col-12 col-md-4 gallery_card">
            <img src="assets/images/img_gallery/9.jpeg" class="gallery_card_item" alt="Фото">
        </div>
    </div>

</div>
<!--Section gallery end-->

<!--Footer-->
<?php
include "footer.php"
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>