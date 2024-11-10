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
$send = $_POST["reg_b"];
if ($send == "Отправить") {
    $server = "127.0.0.1";
    $username = "root";
    $password = "";
    $database = "main";

    $err = "";

    $mysqli = new mysqli($server, $username, $password, $database);

    $login = $_POST["login"];
    $pass = $_POST["pass"];
    $fio = $_POST["fio"];
    $tel = $_POST["tel"];
    $mail = $_POST["mail"];

    $user = null;

    $login = htmlspecialchars($login);
    $pass = htmlspecialchars($pass);
    $fio = htmlspecialchars($fio);
    $tel = htmlspecialchars($tel);
    $mail = htmlspecialchars($mail);

    $login = urldecode($login);
    $pass = urldecode($pass);
    $fio = urldecode($fio);
    $tel = urldecode($tel);
    $mail = urldecode($mail);

    $login = trim($login);
    $pass = trim($pass);
    $fio = trim($fio);
    $tel = trim($tel);
    $mail = trim($mail);

    $result = $mysqli->query("SELECT logi FROM reg");
    while ($row = $result->fetch_assoc()) {
        if ($row['logi'] == $login) {
            $err = $err . "Логин занят; ";
        }
        // else {
        //     $stmt = $mysqli->prepare("INSERT INTO reg(logi, pass, fio, tel, mail) VALUES (?, ?, ?, ?, ?)");
        // }
    }
    $result = $mysqli->query("SELECT mail FROM reg");
    while ($row = $result->fetch_assoc()) {
        if ($row['mail'] == $mail) {
            $err = $err . "Почта занята ";
        }
    }
    if (!empty($err)) {
        echo '<script>alert("' . $err . '")</script>';
    } else {
        //session_start();
        $_SESSION['user'] = $login;
        $result = $mysqli->query("SELECT * FROM `reg` ORDER BY pkey DESC LIMIT 1");
        $pkey = $result->fetch_assoc();
        $pkey = array_shift($pkey) + 1;
        $stmt = $mysqli->prepare("INSERT INTO reg(pkey, logi, pass, fio, tel, mail) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isssis", $pkey, $login, $pass, $fio, $tel, $mail);
        $stmt->execute();
        echo '<script>alert("Вы зарегистрироваллись.")</script>';
    }
   // session_write_close();
}

?>
<body>
    <header>
        <div>
            <div class="fit"><?php
            //session_start();
            echo($_SESSION['user']); 

            ?></div>
            <a href="#">Регистрация</a>
            <a href="autoriz.php">Авторизация</a>
            <a href="zayav.php">Заявления</a>
            <a href="formir.php">Формирование заявлений</a>
            <a href="panel.php">Панель администратора</a>
        </div>
    </header>
    <main>
        <h1>Страница регистрации</h1>
        <form method="POST">
            <input name="login" pattern="\s\w]{1,}" placeholder="Логин" required>
            <span>Латиницей</span>
            <input name="pass" pattern="[\WA-Za-zА-Яа-яЁё0-9]{6,}" placeholder="Пароль" required>
            <span>Минимум 6 символов</span>
            <input name="fio" pattern="[\sа-яёА-ЯЁ]{1,}" placeholder="ФИО" required>
            <span>Кирилицей</span>
            <input name="tel" type="tel" pattern="\+7[0-9]{10}" placeholder="Телефон" required>
            <span>+7(XXX)-XXX-XX-XX</span>
            <input name="mail" type="email" placeholder="Эл. Почта" required>
            <span>example@mail.ru</span>
            <input name="reg_b" type="submit" value="Отправить">
        </form>
    </main>
    <footer>
        ©НарушениямНет 2024
    </footer>
</body>
</html>