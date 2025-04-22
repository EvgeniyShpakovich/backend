<?php
ob_start();

register_shutdown_function('shutdownHandler');
function shutdownHandler()
{
    $error = error_get_last(); 
    if ($error !== null && $error['type'] === E_ERROR) {
        ob_clean(); 
        http_response_code(500);

        echo "<h1>500 Internal Server Error</h1>";
        echo "<p>Вибачте, сталася помилка сервера. </p>";
    }
}

$a = 1/0;

echo "<h1>Сторінка працює</h1><p>Все нормально!</p>";

