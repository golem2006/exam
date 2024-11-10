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
$send = $_POST["aut_b"];
if ($send == "Отправить") {
    $server = "127.0.0.1";
    $username = "root";
    $password = "";
    $database = "main";

    $err = "";

    $mysqli = new mysqli($server, $username, $password, $database);

    $login = $_POST["login"];
    $pass = $_POST["pass"];

    $boo0 = false;
    $boo1 = false;


    



    $login = htmlspecialchars($login);
    $pass = htmlspecialchars($pass);

    $login = urldecode($login);
    $pass = urldecode($pass);

    $login = trim($login);
    $pass = trim($pass);

    $result = $mysqli->query("SELECT logi FROM reg");
    $result1 = $mysqli->query("SELECT pass FROM reg");
    while ($row = $result->fetch_assoc()) {
        if ($row['logi'] == $login) {
            $boo0 = true;
        }
    }
    
    while ($row1 = $result1->fetch_assoc()) {
        if ($row1['pass'] == $pass) {
            $boo1 = true;
        }
    }

    if ($boo0 == true && $boo1 == true) {
        //session_start();
        $_SESSION['user'] = $login;
        echo '<script>alert("Успешный вход.")</script>';
        
    } else {
        echo '<script>alert("Неверные логин или пароль.")</script>';
    }
    //session_write_close();
}

?>
<body>
    <header>
        <div>
            <div class="fit"><?php 
            //session_start();
            echo($_SESSION['user']);?></div>
            <a href="index.php">Регистрация</a>
            <a href="#">Авторизация</a>
            <a href="zayav.php">Заявления</a>
            <a href="formir.php">Формирование заявлений</a>
            <a href="panel.php">Панель администратора</a>
        </div>
    </header>
    <main>
        <h1>Страница авторизации</h1>
        <form method="POST">
            <input name="login" pattern="\s\w]{1,}" placeholder="Логин" required>
            <span>Латиницей</span>
            <input name="pass" pattern="[\WA-Za-zА-Яа-яЁё0-9]{6,}" placeholder="Пароль" required>
            <span>Минимум 6 символов</span>
            <input name="aut_b" type="submit" value="Отправить">
        </form>
    </main>
    <footer>
        ©НарушениямНет 2024
    </footer>
</body>
</html>