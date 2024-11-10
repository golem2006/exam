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
$server = "127.0.0.1";
$username = "root";
$password = "";
$database = "main";

$num = 0;

    $mysqli = new mysqli($server, $username, $password, $database);

    $show = '<tr>
    <th>Описание</th>
    <th>ФИО</th>
    <th>Номер автомобиля</th>
    <th>Статус заявления</th>
    </tr>';

        $result = $mysqli->query("SELECT descr, fio, num, statu FROM `zayav`");
        while ($row = mysqli_fetch_assoc($result)) {
            $num = $num + 1;
            $show = $show . ('<tr>' . '<td>' . $row['descr'] . '</td>' . '<td>' . $row['fio'] . '</td>' . '<td>' . $row['num'] . '</td>' . '<td>' . 
            '
            <select form="statu" name="statu' . $num . '">
                <option value="' . $row['statu'] . '">' . $row['statu'] . '</option>
                <option value="Подтверждено">Подтверждено</option>
                <option value="Отклонено">Отклонено</option>
            </select>
        </td>' . '</tr>');
        
        if ($_POST["statu" . $num ] == null) {
            continue;
        }
        $stmt = $mysqli->prepare("UPDATE `zayav` SET statu=? WHERE pkey=?");
        $stmt->bind_param("si", $_POST["statu" . $num ], $num);
        $stmt->execute();
        }
        $show = '<table><form method="POST" id="statu" name="statu">' . $show . '</form></table><br><input form="statu" name="pan_b" type="submit" value="Обновить статусы">';
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
            <a href="formir.php">Формирование заявлений</a>
            <a href="#">Панель администратора</a>
        </div>
    </header>
    <main>
        <h1>Панель администратора</h1>
        <?php echo($show); ?>
        <span>Обновите страницу после обновления статусов.</span>
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
</html>