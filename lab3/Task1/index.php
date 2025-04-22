<?php
$font = "20px";

if ($_SERVER['REQUEST_METHOD'] == "GET" || isset($_COOKIE['font'])) {
    if (isset($_GET["font"])) {
        $font_choice = $_GET["font"];
        setcookie("font", $font_choice, time() + 3600 * 24 * 30 * 6, "/");
    } elseif (isset($_COOKIE['font'])) {
        $font_choice = $_COOKIE['font'];
    }

    if (isset($font_choice)) {
        if ($font_choice === "small") {
            $font = "20px";
        } else if ($font_choice === "medium") {
            $font = "40px";
        } else if ($font_choice === "big") {
            $font = "50px";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div style="gap:15px;">
        <a href="?font=small">Маленький шрифт</a>
        <a href="?font=medium">Середній шрифт</a>
        <a href="?font=big">Великий шрифт</a>
    </div>
    <div style="font-size:<?= $font ?>;">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet est natus quaerat magnam amet animi vitae architecto dolorum! Illum nemo eius nesciunt velit quaerat officia sed ipsum eum consequatur pariatur?
    </div>
</body>

</html>