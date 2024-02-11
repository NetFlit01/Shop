<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    $item = array(
        'item_id' => $_POST['item_id'],
        'item_image' => $_POST['item_image'], // Keep the image path as it is
        'item_name' => $_POST['item_name'],
        'item_price' => $_POST['item_price'],
        'item_size' => $_POST['item_size']
    );
    array_push($_SESSION['cart'], $item);
}
?>
