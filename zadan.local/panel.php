<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css" >
</head>

<?php
//error_reporting(0);
$server = "127.0.0.1";
$username = "root";
$password = "";
$database = "main";
$send = $_POST["pan_b"];

$show = '<form method="POST" action="pan.php"><input name="login" pattern="[\w]{1,}" placeholder="Логин" required><br>
<input name="pass" pattern="[\WA-Za-zА-Яа-яЁё0-9]{6,}" placeholder="Пароль" required>
<br>
<input name="pan_b" type="submit">
</form>';

$num = 0;



if ($send == "Отправить" && $_POST["login"] == "copp" && $_POST["pass"] == "password") {
    $mysqli = new mysqli($server, $username, $password, $database);

    $show = '<tr>
    <th>Описание</th>
    <th>ФИО</th>
    <th>Номер автомобиля</th>
    <th>Статус заявления</th>
    </tr>';

        $result = $mysqli->query("SELECT descr, fio, num, statu FROM `zayav`");
        while ($row = mysqli_fetch_assoc($result)) {
            $show = $show . ('<tr>' . '<td>' . $row['descr'] . '</td>' . '<td>' . $row['fio'] . '</td>' . '<td>' . $row['num'] . '</td>' . '<td>' . 
            '
            <select name="statu" form="statu">
                <option value="' . $row['statu'] . '">' . $row['statu'] . '</option>
                <option value="Подтверждено">Подтверждено</option>
                <option value="Отклонено">Отклонено</option>
            </select>
        </td>' . '</tr>');
        }
        $show = "<table>" . '<form method="POST" action="pan.php" id="statu">' . $show . '</table><br><input form="statu" name="pan_b" type="submit" value="Обновить статусы"></form>';
        $send = "Обновить результаты";
}

?>
<body>
    <header>
        <div>
            <div class="fit"><?php
                // session_start();
                echo($_SESSION['user']);
                ?></div>
            <a href="index.php">Регистрация</a>
            <a href="autoriz.php">Авторизация</a>
            <a href="zayav.php">Заявления</a>
            <a href="formir.php">Формирование заявлений</a>
            <a href="#">Панель администратора</a>
        </div>
    </header>
    <main>
        <h1>Панель администратора</h1>
        <?php echo($show); ?>
    </main>
    <footer>
        ©НарушениямНет 2024
    </footer>
</html>