<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "root";

// Создание соединения
$conn = mysqli_connect($servername, $username, $password);
mysqli_set_charset($conn, "utf8");


// Проверка соединения
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}
else{
    // Проверка и создание базы данных
    $sql_check_create_db = "CREATE DATABASE IF NOT EXISTS shop CHARACTER SET utf8 COLLATE utf8_general_ci";
    $conn->query($sql_check_create_db);

    // Выбор базы данных
    $conn->select_db("shop");

    // Проверка и создание таблицы
    $sql_check_create_table_customers = "CREATE TABLE IF NOT EXISTS customers (
        customer_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        full_name VARCHAR(100) NOT NULL,
        delivery VARCHAR(255) NOT NULL,
        email VARCHAR(50) NULL
    ) CHARACTER SET utf8 COLLATE utf8_general_ci";
    $conn->query($sql_check_create_table_customers);

    $sql_check_create_table_orders = "CREATE TABLE IF NOT EXISTS orders (
        order_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        customer_id INT(6) UNSIGNED,
        total_price DECIMAL(10, 2),
        FOREIGN KEY (customer_id) REFERENCES customers(customer_id)
    ) CHARACTER SET utf8 COLLATE utf8_general_ci";
    $conn->query($sql_check_create_table_orders);


    $sql_check_create_table_order_details = "CREATE TABLE IF NOT EXISTS order_details (
        order_detail_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        order_id INT(6) UNSIGNED,
        item_name VARCHAR(100) NOT NULL,
        item_size VARCHAR(10) NOT NULL,
        item_price DECIMAL(10,2),
        FOREIGN KEY (order_id) REFERENCES orders(order_id))
    CHARACTER SET utf8 COLLATE utf8_general_ci";
    $conn->query($sql_check_create_table_order_details);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Получение данных из формы
        $full_name = $_POST["full-name"];
        $email = $_POST["email"];
        $delivery = $_POST["delivery-address"];
        // Подготовленное выражение для вставки данных
        $sql_insert = "INSERT INTO customers (full_name, delivery, email) VALUES ('$full_name', '$delivery','$email')";
        if (mysqli_query($conn, $sql_insert)) {
            // Получение ID новой записи в таблице customers
            $customer_id = mysqli_insert_id($conn);


            // Добавление записи в таблицу orders
            $sql_insert_order = "INSERT INTO orders (customer_id, total_price) VALUES ($customer_id, 0)";
            if (mysqli_query($conn, $sql_insert_order)) {
                $order_id = mysqli_insert_id($conn);

                // Добавление записей в таблицу order_details (для каждого товара в заказе)
                $total_price = 0;
                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $index => $item) {
                        $name = $item['item_name'];
                        $price = $item['item_price'];
                        $size = $item['item_size'];

                        // Добавление записи в таблицу order_details для каждого товара
                        $sql_insert_order_details = "INSERT INTO order_details (item_name, item_price, item_size, order_id) VALUES ('$name', $price, '$size', $order_id)";
                        if (mysqli_query($conn, $sql_insert_order_details)) {
                            $total_price += $price;
                        } else {
                            echo "Ошибка при добавлении деталей заказа: " . mysqli_error($conn);
                        }
                    }
                    // Обновление общей стоимости заказа
                    $sql_update_order_total = "UPDATE orders SET total_price = $total_price WHERE order_id = $order_id";
                    if (!mysqli_query($conn, $sql_update_order_total)) {
                        echo "Ошибка при обновлении общей стоимости заказа: " . mysqli_error($conn);
                    }
                }
            } else {
                echo "Ошибка при добавлении заказа: " . mysqli_error($conn);
            }
        } else {
            echo "Ошибка при добавлении клиента: " . mysqli_error($conn);
        }
    }

}
// Закрытие соединения
mysqli_close($conn);
session_unset();
$_SESSION['cart'] = array(); // очищаем переменную $_SESSION['cart']
header("Location: ../index.html");
?>