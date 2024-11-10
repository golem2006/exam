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
error_reporting(0);
    $open = "disabled";

    //session_start();

    if (!empty($_SESSION['user'])) {
        $open = "";
    }

$send = $_POST["for_b"];
if ($send == "Отправить") {
    $server = "127.0.0.1";
    $username = "root";
    $password = "";
    $database = "main";

    $err = "";

    $mysqli = new mysqli($server, $username, $password, $database);

    $num = $_POST["num"];
    $descr = $_POST["descr"];

    $statu = "Новое";

    $boo0 = false;
    $boo1 = false;


    $num = htmlspecialchars($num);
    $descr = htmlspecialchars($descr);

    $num = urldecode($num);
    $descr = urldecode($descr);

    $num = trim($num);
    $descr = trim($descr);

    //session_start();
    $login = $_SESSION['user'];

    $stmt = $mysqli->prepare("SELECT fio FROM `reg` WHERE `logi` = ?");
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $result = $stmt->get_result();
    $fio = $result->fetch_assoc();
    $fio = $fio["fio"];

    $result = $mysqli->query("SELECT * FROM `zayav` ORDER BY pkey DESC LIMIT 1");
    $pkey = $result->fetch_assoc();
    $pkey = array_shift($pkey) + 1;
    $stmt = $mysqli->prepare("INSERT INTO zayav(pkey, fio, descr, num, statu, logi) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssss", $pkey, $fio, $descr, $num, $statu, $login);
    $stmt->execute();
    echo '<script>alert("Заявление отправлено.")</script>';
}
?>
<body>
    <header>
        <div>
            <div class="fit"><?php
                //session_start();
                echo($_SESSION['user']);
                ?></div>
            <a href="index.php">Регистрация</a>
            <a href="autoriz.php">Авторизация</a>
            <a href="zayav.php">Заявления</a>
            <a href="#">Формирование заявлений</a>
            <a href="panel.php">Панель администратора</a>
        </div>
    </header>
    <main>
        <h1>Страница формирования заявлений</h1>
        <form method="POST">
            <input type="text" name="num" required <?php echo($open); ?>>
            <span>Государственный регистрационный<br>номер автомобиля</span>
            <textarea required rows="3" type="text" name="descr" <?php echo($open); ?>></textarea>
            <span>Описание нарушения</span>
            <input name="for_b" type="submit">
        </form>
    </main>
    <footer>
        ©НарушениямНет 2024
    </footer>
</body>
</html>