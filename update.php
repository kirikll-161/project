<?php

    /*
     * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
     */

    require_once 'config/connect.php';

    /*
     * Получаем ID продукта из адресной строки - /product.php?id=1
     */

    $product_id = $_GET['id'];

    /*
     * Делаем выборку строки с полученным ID выше
     */

    $product = mysqli_query($connect, "SELECT * FROM `products` WHERE `id` = '$product_id'");

    /*
     * Преобразовывем полученные данные в нормальный массив
     * Используя функцию mysqli_fetch_assoc массив будет иметь ключи равные названиям столбцов в таблице
     */

    $product = mysqli_fetch_assoc($product);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Product</title>
</head>
<body>
    <h3>Update Product</h3>
    <form action="vendor/update.php" method="post">
        <input type="hidden" name="id" value="<?= $product['id'] ?>">
        <p>Title</p>
        <input type="text" name="title" value="<?= $product['title'] ?>">
        <p>Описание</p>
        <textarea name="description"><?= $product['description'] ?></textarea>
        <p>Цена</p>
        <input type="number" name="price" value="<?= $product['price'] ?>">
        <p>Категория</p>
<input type="text" name="kat" value="<?= $product['kat'] ?>">
         <br> <br>
        <button type="submit">Update</button>
    </form>
</body>
</html>