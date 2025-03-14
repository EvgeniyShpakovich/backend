<?php
// Перевіряємо, чи були отримані дані через POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['x']) && isset($_POST['y'])) {
        
        // Отримуємо значення x і y
        $x = $_POST['x'];
        $y = $_POST['y'];

        // Підключаємо файл з функціями
        include 'functions.php';

        // Виконуємо математичні обчислення
        $x_power_y = x_power($x, $y);
        $factorial_x = factorial($x);
        $my_tg_x = my_tg($x);
        $sin_x = sin($x);
        $cos_x = cos($x);
        $tg_x = tan($x);

        // Вивід результатів у таблиці
        echo "<table border='1'>";
        echo "<tr><th>x^y</th><th>Factorial(x)</th><th>my_tg(x)</th><th>sin(x)</th><th>cos(x)</th><th>tg(x)</th></tr>";
        echo "<tr>";
        echo "<td>$x_power_y</td>";
        echo "<td>$factorial_x</td>";
        echo "<td>$my_tg_x</td>";
        echo "<td>$sin_x</td>";
        echo "<td>$cos_x</td>";
        echo "<td>$tg_x</td>";
        echo "</tr></table>";
    } else {
        echo "Необхідно заповнити обидва поля!";
    }
}
?>
