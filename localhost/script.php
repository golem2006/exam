<?php

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
        $err = $err . "Логин занят" . "<br>";
    }
    // else {
    //     $stmt = $mysqli->prepare("INSERT INTO reg(logi, pass, fio, tel, mail) VALUES (?, ?, ?, ?, ?)");
    // }
}
$result = $mysqli->query("SELECT mail FROM reg");
while ($row = $result->fetch_assoc()) {
    if ($row['mail'] == $mail) {
        $err = $err . "Почта занята" . "<br>";
    }
}
if (!empty($err)) {
    echo '<script>alert("' . $err . '")</script>';
} else {
    $result = $mysqli->query("SELECT * FROM `reg` ORDER BY pkey DESC LIMIT 1");
    $pkey = $result->fetch_assoc();
    $pkey = array_shift($pkey) + 1;
    $stmt = $mysqli->prepare("INSERT INTO reg(pkey, logi, pass, fio, tel, mail) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssis", $pkey, $login, $pass, $fio, $tel, $mail);
    $stmt->execute();
    echo '<script>alert("Вы зарегистрироваллись.")</script>';
}

?>