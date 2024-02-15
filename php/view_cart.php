<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Корзина</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style_for_cart.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
</head>

<div class="header">
    <h1> HARITA</h1>
</div>
<?php
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $count = 0;  // добавляем счетчик товаров в строке
    $total_price = 0;
    echo '<div class="cart-container">';  // начало обертки для товаров
    foreach ($_SESSION['cart'] as $index => $item) {
        echo '<div class="cart-item">';  // добавляем обертку для каждого товара
        echo '<div class="cart-item-img">';
        echo '<img class="img-cart" src="../' . $item['item_image'] . '">';
        echo '</div>';
        echo '<div class="cart-text">';
        echo '<p class="name">' . $item['item_name'] . '</p>';
        echo '<p class="price"> Цена ' . $item['item_price'] . '</p>';
        echo '<p class="size"> Размер:' . $item['item_size']. '<p>';
        echo '</div>';
        echo '<form method="post" action="remove_from_cart.php">';
        echo '<input type="hidden" name="index" value="' . $index . '">';
        echo '<button class="button" type="submit">Удалить</button>';
        echo '</form>';
        echo '</div>';

        $count++; // увеличиваем счетчик товаров в строке
        if ($count % 3 == 0) {  // если количество товаров кратно 3, закрываем текущую строку и начинаем новую
            echo '</div>';  // закрываем текущую строку
            echo '<div class=line_shadow></div>';
            echo '<div class="cart-container">';  // начинаем новую строку
        }
        $total_price += (int)$item['item_price'];  // суммируем общую цену товаров
    }
    echo '</div>';  // закрываем последнюю строку
    echo '<div class="conteiner-sum">';
    echo '<p class="sum">Общая цена: ' . $total_price . ' рублей</p>';
    echo '<a class="button" id="purchase" href="order.php">Заказать</a>';
    echo '</div>';
} else {
    echo '
    <div class="empty-cart">
        <div class="img-empty-cart">
            <img src="../img/Free_cart/free-icon-shopping-cart.png">
        </div>
        <div class="text-empty-cart">
            <h1> Ваша корзина пуста </h1>
        </div>
    </div>';
}

?>

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

