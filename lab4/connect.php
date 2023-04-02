<?php
$host = 'localhost';
$db_name = 'nedvisimost';
$db_user = 'root';
$db_pass = 'root';

$conn = mysqli_connect($host, $db_user, $db_pass, $db_name);
if(!$conn){
    die("Ошибка соединения с базой данных". mysqli_connect_error());
}