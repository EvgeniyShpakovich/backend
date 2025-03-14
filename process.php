<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Збереження даних у сесію
    $_SESSION["login"] = $_POST["login"];
    $_SESSION["password"] = $_POST["password"];
    $_SESSION["confirm_password"] = $_POST["confirm_password"];
    $_SESSION["gender"] = $_POST["gender"];
    $_SESSION["city"] = $_POST["city"];
    $_SESSION["favorite_games"] = isset($_POST["favorite_games"]) ? $_POST["favorite_games"] : [];
    $_SESSION["about"] = $_POST["about"];

    // Обробка файлу (якщо потрібно)
    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["photo"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            $_SESSION["photo_path"] = $target_file; // Зберігаємо шлях до файлу в сесію
        } else {
            $_SESSION["photo_error"] = "Помилка завантаження фотографії.";
        }
    }

    // Перенаправлення на сторінку результатів (якщо потрібно)
    header("Location: results.php");
    exit();
}
?>