<?php
session_start();

// Обробка GET-запиту для вибору мови
if (isset($_GET["lang"])) {
    $lang = $_GET["lang"];
    setcookie("lang", $lang, time() + 6 * 30 * 24 * 60 * 60); // Кукі на півроку
}

// Читання кукі
$lang = isset($_COOKIE["lang"]) ? $_COOKIE["lang"] : "ukr"; // Мова за замовчуванням - українська
$languages = ["ukr" => "Українська", "en" => "English", "de" => "Deutsch"];
$lang_name = $languages[$lang];

// Перевірка, чи встановлена сесія для даних форми
$login = isset($_SESSION["login"]) ? $_SESSION["login"] : "";
$password = isset($_SESSION["password"]) ? $_SESSION["password"] : "";
$confirm_password = isset($_SESSION["confirm_password"]) ? $_SESSION["confirm_password"] : "";
$gender = isset($_SESSION["gender"]) ? $_SESSION["gender"] : "";
$city = isset($_SESSION["city"]) ? $_SESSION["city"] : "Zhytomyr";
$favorite_games = isset($_SESSION["favorite_games"]) ? $_SESSION["favorite_games"] : [];
$about = isset($_SESSION["about"]) ? $_SESSION["about"] : "";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Форма реєстрації</title>
</head>
<body>
    <p>Вибрана мова: <?php echo $lang_name; ?></p>

    <div style="text-align: center;">
        <?php foreach ($languages as $lang => $lang_name): ?>
            <a href="index.php?lang=<?php echo $lang; ?>">
                <img src="images/<?php echo $lang; ?>.png" alt="<?php echo $lang_name; ?>" width="50">
            </a>
        <?php endforeach; ?>
    </div>

    <form action="process.php" method="post" enctype="multipart/form-data">
        <label for="login">Логін:</label>
        <input type="text" name="login" id="login" value="<?php echo $login; ?>" required><br><br>

        <label for="password">Пароль:</label>
        <input type="password" name="password" id="password" value="<?php echo $password; ?>" required><br><br>

        <label for="confirm_password">Пароль (ще раз):</label>
        <input type="password" name="confirm_password" id="confirm_password" value="<?php echo $confirm_password; ?>" required><br><br>

        <label>Стать:</label>
        <input type="radio" name="gender" value="male" id="male" <?php if ($gender == "male") echo "checked"; ?> required>
        <label for="male">чоловік</label>
        <input type="radio" name="gender" value="female" id="female" <?php if ($gender == "female") echo "checked"; ?>>
        <label for="female">жінка</label><br><br>

        <label for="city">Місто:</label>
        <select name="city" id="city" required>
            <option value="Zhytomyr" <?php if ($city == "Zhytomyr") echo "selected"; ?>>Житомир</option>
            </select><br><br>

        <label>Улюблені гри:</label><br>
        <input type="checkbox" name="favorite_games[]" value="football" id="football" <?php if (in_array("football", $favorite_games)) echo "checked"; ?>>
        <label for="football">футбол</label><br>
        <input type="checkbox" name="favorite_games[]" value="basketball" id="basketball" <?php if (in_array("basketball", $favorite_games)) echo "checked"; ?>>
        <label for="basketball">баскетбол</label><br>
        <input type="checkbox" name="favorite_games[]" value="volleyball" id="volleyball" <?php if (in_array("volleyball", $favorite_games)) echo "checked"; ?>>
        <label for="volleyball">волейбол</label><br>
        <input type="checkbox" name="favorite_games[]" value="chess" id="chess" <?php if (in_array("chess", $favorite_games)) echo "checked"; ?>>
        <label for="chess">шахи</label><br>
        <input type="checkbox" name="favorite_games[]" value="wot" id="wot" <?php if (in_array("wot", $favorite_games)) echo "checked"; ?>>
        <label for="wot">World of Tanks</label><br><br>

        <label for="about">Про себе:</label><br>
        <textarea name="about" id="about" rows="4" cols="50"><?php echo $about; ?></textarea><br><br>

        <label for="photo">Фотографія:</label>
        <input type="file" name="photo" id="photo"><br><br>

        <input type="submit" value="Зареєструватися">
    </form>
</body>
</html>