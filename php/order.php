<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Заказ</title>
    <meta charset="UTF-8">
    <script src="../js/checking_form.js"></script>
    <link rel="stylesheet" href="../css/style_for_order_page.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
</head>
<body>
<div class="header">
    <h1> HARITA</h1>
</div>

<form action="database.php" method="post" onsubmit="return validateForm(event)">
    <label for="full-name">ФИО:</label>
    <input type="text" id="full-name" name="full-name" placeholder="Петров Иван Сергеевич">
    <label for="delivery-address">Адрес доставки:</label>
    <input type="text" id="delivery-address" name="delivery-address" placeholder="Ул. Пушкина, д. 10, кв. 5">
    <label for="email">Электронная почта:</label>
    <input type="email" id="email" name="email" placeholder="example@example.com">
    <button class="button_for_sending" type="submit">Отправить</button>
</form>

<div class="return-page">
    <a class="button" href="../index.html">Вернуться на главную страницу</a>
</div>

<footer class="footer" id="contacts">
    <div class="waves">
        <div class="wave" id="wave1"></div>
        <div class="wave" id="wave2"></div>
        <div class="wave" id="wave3"></div>
        <div class="wave" id="wave4"></div>
    </div>
    <ul class="social-icon" >
        <li class="social-icon__item"><a class="social-icon__link" href="#">
                <ion-icon name="logo-facebook"></ion-icon>
            </a></li>
        <li class="social-icon__item"><a class="social-icon__link" href="#">
                <ion-icon name="logo-twitter"></ion-icon>
            </a></li>
        <li class="social-icon__item"><a class="social-icon__link" href="#">
                <ion-icon name="logo-linkedin"></ion-icon>
            </a></li>
        <li class="social-icon__item"><a class="social-icon__link" href="#">
                <ion-icon name="logo-instagram"></ion-icon>
            </a></li>
        <li class="social-icon__item"><a class="social-icon__link" href="#">
                <ion-icon name="mail"></ion-icon>
            </a></li>
    </ul>
    <p >&copy;2024 Магазин одежды Harita. Все права защищены.</p>
</footer>
</body>
</html>