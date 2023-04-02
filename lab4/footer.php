<div class="footer container-fluid">
    <div class="footer-content container">
        <div class="row">
            <div class="footer-section about col-md-4 col-12">
                <h3 class="logo-text">
                    <a href="index.php" class="logo"><i class='bx bxs-buildings'></i>NedvSPB</i></a>
                </h3>
                <p>
                    Цель нашего проекта - помочь людям при поиске и покупке квартир,
                    путем выдачи им списка агенств недвижимости в городе Санкт-Петербург
                </p>
                <div class="contact">
                    <span><i class='bx bx-phone'></i> &nbsp; +7(906)463-48-34</span>
                    <span><i class='bx bx-envelope' ></i> &nbsp; aakoval01@gmail.com</span>
                </div>
                <div class="socials">
                    <a href="#"><i class='bx bxl-telegram' ></i></a>
                    <a href="#"><i class='bx bxl-vk' ></i></a>
                    <a href="#"><i class='bx bxl-instagram' ></i></a>
                </div>
            </div>

            <div class="footer-section links col-md-4 col-12">
                <h3>Quick links</h3>
                <br>
                <ul>
                    <a href="sobitia.php">
                        <li>События</li>
                    </a>
                    <a href="#">
                        <li>Команда</li>
                    </a>
                    <a href="galery.php">
                        <li>Галерея</li>
                    </a>
                    <a href="#">
                        <li>Что-то еще</li>
                    </a>
                </ul>
            </div>

            <div class="footer-section contact-form col-md-4 col-12">
                <h3>Контакты</h3>
                <br>
                <form method="post">
                    <input type="text" name="theme-send" class="text-input contact-input" placeholder="Введите тему письма...">
                    <input type="email" name="email" class="text-input contact-input" placeholder="Введите ваш Email...">
                    <textarea rows="4" name="message" class="text-input contact input" placeholder="Введите ваше сообщение..."></textarea>
                    <button type="submit" class="btn btn-big contact-btn" name="send-mail">
                        <i class='bx bx-envelope' ></i>
                        Отправить
                    </button>
                    <?php
                    if(isset($_POST['send-mail'])){
                        mail($_POST['email'], $_POST['theme-send'], $_POST['message'], 'From: aakoval01@gmail.com');
                        echo "<center><strong><i>Вам отправлено письмо!</i></strong></center><br>";
                        header('Refresh: 1.5; URL = index.php');
                    }
                    ?>
                </form>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; nedvSBP.ru | Designed by A4reK0
        </div>
    </div>
</div>