<?php
include "connect.php";
session_start();
unset($_SESSION['message']);
if(isset($_GET['exit']))
{
    session_destroy();
    header('Location: index.php');
    exit;
}
if(!isset($_SESSION['id'])){
    header("Location: login.php");
}
?>

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


</head>
<body>
<?php
include "header.php";
?>
<!--Main section-->
<center>
<div class="container">
    <div class="lk-content">
        <h2 align="center">Личный кабинет</h2>
    </div>
    <div class="lk">
        <?php
        if(isset($_SESSION['login']))
        {
            echo "<p>Здравствуйте, ".$_SESSION['login']."</p>";
        }
        ?>
    </div>
    <div class="info">
        <?php
        include "connect.php";
        $quer = "SELECT * FROM user WHERE `id_пользователя` = ".$_SESSION['id'];
        $checkUsers = mysqli_query($conn,$quer)or die("Ошибка запроса поиска" . mysqli_error($conn));
        $row = mysqli_fetch_assoc($checkUsers);
        echo "<p>ФИО: ".$row['ФИО']."<br>
                         Email: ".$row['email']."<br
                         Телефон: ".$row['Телефон']."<br>  
                         Дата регистрации: ".$row['Дата_регистрации']."<br></p>";
        ?>
    </div>
    <div class="buttons row">
        <form method="post">
            <input type="submit" name="hist" class="btn-lk" value="История Заказов">
            <input type="submit" name="bas" class="btn-lk" value="Корзина">
        </form>
        <?php
        echo '<form  metod="get"><input type="submit" class="btn-lk" name="exit" value="Выход"><br></form>';
        ?>
    </div>
    <div class="table_uslug">
        <h2 align="center">Список Услуг</h2>
        <center>
            <?php
            include "connect.php";
            $req = mysqli_query($conn,'Select * from Услуга') or die("Ошибка запроса". mysqli_error($conn));
            echo "<form metod = 'GET'>";
            if($req)
            {
                echo "<center><table class='table'><tr><th>Название услуги</th><th>Цена</th><th>Выбор</th></tr>";
                while ($row_u = mysqli_fetch_assoc($req))
                {
                    echo "<tr><td>".$row_u['Услуга']."</td>
                    <td>".$row_u['Цена']."</td><td><input type=\"checkbox\" name=\"choices[]\" value = \"".$row_u['ID_Услуги']."\"></td>
                    </tr>";
                }
                echo "</table></center>
                      <b>Выберите интересующую вас услугу</b><br><br>
                      <input class='btn-lk' type='submit' name='add' value='Добавить'></form>";
                if(!empty($_GET['add']))
                {
                    if(!empty($_GET['choices']))
                    {
                        if(isset($_SESSION['id']))
                        {
                            $_SESSION['bas'] = $_GET['choices'];
                            echo "Услуга добавлена<br><br>";
                        }
                        else echo "К сожалению вы не зарегистрированы<b><a href=\"login.php\">Авторизуйтесь</a> или <a href=\"reg.php\">зарегистрируйтесь</a> на сайте и возвращайтесь<br><br>";
                    }
                    else echo "<b>Ничего не выбрано</b>";
                }
            }
            ?>
        </center>
    </div>
    <div class="vivod">
        <?php
        if(isset($_POST['bas'])){
            if(isset($_SESSION['bas']))
            {
                echo "<h2 align='center'>Ваша Корзина</h2>";
                echo "<center><table class='table' cellspacing='0' cellpadding='0'>
                            <tr><th>Услуга</th><th>Цена</th></tr>";
                foreach ($_SESSION['bas'] as $key => $value)
                {
                    $bas_qry = 'Select * from Услуга where ID_Услуги='.$value;
                    $qry_res = mysqli_query($conn,$bas_qry)or die("Ошибка запроса поиска" . mysqli_error($conn));
                    $r = mysqli_fetch_assoc($qry_res);
                    echo "<tr><td>".$r['Услуга']."</td><td>".$r['Цена']."</td></tr>";
                }
                echo "</table></center>
                        <form method='post'><center>
                        <input class='btn-lk' type='submit' name='buy' value='Заказать'>
                        <input class='btn-lk' type='submit' name='x' value='Закрыть'>
                        </center></form>";
            } else echo "<center><p><strong>Корзина пуста</strong></p></center>";
        } elseif (isset($_POST['buy']))
        {
            foreach ($_SESSION['bas'] as $key => $value)
            {
                $add = "Insert into Корзина (id_пользователя, id_услуги) values ('".$_SESSION['id']."','".$value."')";
                $add = mysqli_query($conn,$add)or die("Ошибка запроса добавления" . mysqli_error($conn));
            }
            echo "<center><p><strong>Услуга успешно заказана!</strong></p></center>";
            unset($_SESSION['bas']);
            header('Refresh: 3; URL = lk.php');

        } elseif (isset($_POST['hist']))
        {
           $qry_his = "Select COUNT(*) from Корзина where id_пользователя=".$_SESSION['id'];
           $his_res = mysqli_query($conn,$qry_his)or die("Ошибка запроса истории " . mysqli_error($conn));
           $rh = mysqli_fetch_row($his_res);
           echo "<center><strong><i>Ваша история покупок</i></strong></center>";
           echo '<form method="get">';
           if($rh[0] > 0)
           {
               $query = "SELECT *, user.ФИО, Услуга.Услуга FROM Корзина 
                            INNER JOIN user ON (Корзина.id_пользователя = user.id_пользователя) 
                            INNER JOIN Услуга ON (Корзина.id_услуги = Услуга.ID_Услуги) 
                                          WHERE Корзина.id_пользователя = ".$_SESSION['id'];
               $res_qry = mysqli_query($conn,$query)or die("Ошибка запроса истории 2" . mysqli_error($conn));
               echo '<center><table class="table"><tr><th>Номер Заказа</th><th>ФИО</th><th>Услуга</th><th>Стоимость</th><th>Дата Заказа</th></tr>';
               while ($row_h = mysqli_fetch_assoc($res_qry))
               {
                   echo "<tr><td>".$row_h['id_заказа']."</td><td>".$row_h['ФИО']."</td>
                          <td>".$row_h['Услуга']."</td><td>".$row_h['Цена']."</td><td>".$row_h['Дата_заказа']."</td></tr>";
               }
               echo "</table></center>";
           }
           else echo "<center><strong><i>У вас нет Заказов!</i></strong></center>";
        }
        ?>
    </div>
</div>
</center>

<?php
include "footer.php";
?>
</body>
</html>
