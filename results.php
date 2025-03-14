<?php
session_start();

// Перевірка, чи встановлена сесія для даних форми
$login = isset($_SESSION["login"]) ? $_SESSION["login"] : "";
$password = isset($_SESSION["password"]) ? $_SESSION["password"] : "";
$confirm_password = isset($_SESSION["confirm_password"]) ? $_SESSION["confirm_password"] : "";
$gender = isset($_SESSION["gender"]) ? $_SESSION["gender"] : "";
$city = isset($_SESSION["city"]) ? $_SESSION["city"] : "";
$favorite_games = isset($_SESSION["favorite_games"]) ? $_SESSION["favorite_games"] : [];
$about = isset($_SESSION["about"]) ? $_SESSION["about"] : "";
$photo_path = isset($_SESSION["photo_path"]) ? $_SESSION["photo_path"] : "";
$photo_error = isset($_SESSION["photo_error"]) ? $_SESSION["photo_error"] : "";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Результати реєстрації</title>
</head>
<body>
    <h1>Результати реєстрації</h1>

    <p><b>Логін:</b> <?php echo $login; ?></p>
    <p><b>Пароль:</b> <?php echo (strlen($password) != strlen($confirm_password)) ? "не співпадає" : "збігаються"; ?></p>
    <p><b>Стать:</b> <?php echo ($gender == "male") ? "чоловік" : "жінка"; ?></p>
    <p><b>Місто:</b> <?php echo $city; ?></p>
    <p><b>Улюблені ігри:</b> <?php echo implode(", ", $favorite_games); ?></p>
    <p><b>Про себе:</b> <?php echo nl2br($about); ?></p>

    <?php if (!empty($photo_path)): ?>
        <p><b>Фотографія:</b></p>
        <img src="<?php echo $photo_path; ?>" width="200">
    <?php elseif (!empty($photo_error)): ?>
        <p><b><?php echo $photo_error; ?></b></p>
    <?php endif; ?>

    <p><a href="index2.2.php">Повернутися на головну сторінку</a></p>
</body>
</html>