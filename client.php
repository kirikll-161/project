<?php

/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once 'config/connect.php';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Client</title>
</head>
<style>
    th, td {
        padding: 10px;
    }

    th {
        background: #606060;
        color: #fff;
    }

    td {
        background: #b5b5b5;
    }
</style>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Логин</th>
            <th>Пароль</th>
        </tr>

        <?php

            /*
             * Делаем выборку всех строк из таблицы "products"
             */

            $client = mysqli_query($connect, "SELECT * FROM `client`");

            /*
             * Преобразовываем полученные данные в нормальный массив
             */

            $client = mysqli_fetch_all($client);

            /*
             * Перебираем массив и рендерим HTML с данными из массива
             * Ключ 0 - id
             * Ключ 1 - title
             * Ключ 2 - price
             * Ключ 3 - description
             */

            foreach ($client as $client) {
                ?>
                    <tr>
                        <td><?= $client[0] ?></td>
                        <td><?= $client[1] ?></td>
                        <td><?= $client[3] ?></td>
                        <td><?= $client[2] ?></td>
                        
                        <td><a href="update2.php?id=<?= $product[0] ?>">Update</a></td>
                        <td><a style="color: red;" href="vendor/delete.php?id=<?= $product[0] ?>">Delete</a></td>
                    </tr>
                <?php
            }
        ?>
    </table>
    <h3>Создание нового клиента</h3>
    <form action="vendor/create.php" method="post">
        <p>Название</p>
        <textarea name="Name"></textarea>
        <p>Логин</p>
        <input type="number" name="Login">
         <p>Пароль</p>
        <input type="number" name="Password">
         <br> <br>
        <button type="submit">Add new client</button>
    </form>
<a href="index.php" class="button1">Перейти к товарам</a>
<table>
        

        
</body>
</html>
