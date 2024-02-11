<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $index = $_POST['index'];
    if (isset($_SESSION['cart'][$index])) {
        unset($_SESSION['cart'][$index]);
    }
}
header('Location: view_cart.php'); // Перенаправляем пользователя обратно на страницу корзины
exit;
?>
