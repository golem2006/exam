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

$show = "";

$mysqli = new mysqli($server, $username, $password, $database);
    // session_start();
    $login = $_SESSION['user'];

    $stmt = $mysqli->prepare("SELECT descr, fio, num, statu FROM `zayav` WHERE `logi` = ?");
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = mysqli_fetch_assoc($result)) {
        $show = $show . ('<tr>' . '<td>' . $row['descr'] . '</td>' . '<td>' . $row['fio'] . '</td>' . '<td>' . $row['num'] . '</td>' . '<td>' . $row['statu'] . '</td>' . '</tr>');  
    }
?>
<body>
    <header>
        <div>
            <div class="fit"><?php
                // session_start()
                echo($_SESSION['user']);
                ?></div>
            <a href="index.php">Регистрация</a>
            <a href="autoriz.php">Авторизация</a>
            <a href="#">Заявления</a>
            <a href="formir.php">Формирование заявлений</a>
            <a href="panel.php">Панель администратора</a>
        </div>
    </header>
    <main>
        <h1>Страница заявлений</h1>
        <table>
            <tr>
                <th>Описание</th>
                <th>ФИО</th>
                <th>Номер автомобиля</th>
                <th>Статус заявления</th>
            </tr>
            <?php echo($show); ?>
        </table>
    </main>
    <footer>
        ©НарушениямНет 2024
    </footer>
    <script>
    const element = document.querySelector('footer')

    window.visualViewport.addEventListener('resize', function() {
        element.classList.add('scrol')
    })

    </script>
</body>
</html>