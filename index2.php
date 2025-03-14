<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Текстові операції та додаткові завдання</title>
    <script>
        // Функція для показу/приховування блоків завдань
        function showTasks() {
            var selectedOption = document.getElementById("blockSelect").value;

            // Приховуємо всі блоки
            var allBlocks = document.querySelectorAll(".task-block");
            allBlocks.forEach(function(block) {
                block.style.display = "none";
            });

            // Показуємо вибраний блок
            if (selectedOption) {
                document.getElementById(selectedOption).style.display = "block";
            }
        }
    </script>
</head>
<body>
    <h1>Текстові операції та додаткові завдання</h1>

    <!-- Вибір блоку завдань -->
    <label for="blockSelect">Виберіть блок завдань:</label>
    <select id="blockSelect" onchange="showTasks()">
        <option value="">Оберіть...</option>
        <option value="block1">Блок 1 (Завдання 1-5)</option>
        <option value="block2">Блок 2 (Завдання 6 і далі)</option>
    </select>

    <hr>

    <!-- Блок 1: Завдання 1-5 -->
    <div id="block1" class="task-block" style="display: none;">
        <h2>Блок 1: Текстові операції та завдання 1-5</h2>

        <!-- Завдання 1: Заміна символів у тексті -->
        <h3>1. Заміна символів у тексті</h3>
        <form method="post">
            <label for="text">Текст:</label><br>
            <textarea name="text" id="text" rows="4" cols="50"><?php echo isset($_POST['text']) ? htmlspecialchars($_POST['text']) : ''; ?></textarea><br><br>
            
            <label for="find">Знайти:</label><br>
            <input type="text" name="find" id="find" value="<?php echo isset($_POST['find']) ? htmlspecialchars($_POST['find']) : ''; ?>"><br><br>
            
            <label for="replace">Замінити на:</label><br>
            <input type="text" name="replace" id="replace" value="<?php echo isset($_POST['replace']) ? htmlspecialchars($_POST['replace']) : ''; ?>"><br><br>
            
            <input type="submit" name="replace_text" value="Замінити">
        </form>

        <?php
        if (isset($_POST['replace_text'])) {
            $text = $_POST['text'] ?? '';
            $find = $_POST['find'] ?? '';
            $replace = $_POST['replace'] ?? '';
            
            $result = str_replace($find, $replace, $text);
            
            echo "<h3>Результат заміни:</h3>";
            echo "<textarea rows='4' cols='50' readonly>" . htmlspecialchars($result) . "</textarea>";
        }
        ?>

        <hr>

        <!-- Завдання 2: Сортування назв міст -->
        <h3>2. Сортування назв міст за алфавітом</h3>
        <form method="post">
            <label for="cities">Введіть назви міст через пробіл:</label><br>
            <textarea name="cities" id="cities" rows="4" cols="50"><?php echo isset($_POST['cities']) ? htmlspecialchars($_POST['cities']) : ''; ?></textarea><br><br>
            
            <input type="submit" name="sort_cities" value="Сортувати міста">
        </form>

        <?php
        if (isset($_POST['sort_cities'])) {
            $cities = $_POST['cities'] ?? '';
            $cityArray = explode(' ', trim($cities));
            $cityArray = array_filter($cityArray); // Видаляємо порожні елементи
            sort($cityArray, SORT_FLAG_CASE | SORT_STRING); // Сортуємо за алфавітом
            
            $sortedCities = implode(' ', $cityArray);
            
            echo "<h3>Відсортовані міста:</h3>";
            echo "<textarea rows='4' cols='50' readonly>" . htmlspecialchars($sortedCities) . "</textarea>";
        }
        ?>

        <hr>

        <!-- Завдання 3: Витягнення імені файлу без розширення -->
        <h3>3. Витягнення імені файлу без розширення</h3>
        <form method="post">
            <label for="filepath">Введіть повний шлях до файлу:</label><br>
            <input type="text" name="filepath" id="filepath" size="70" value="<?php echo isset($_POST['filepath']) ? htmlspecialchars($_POST['filepath']) : ''; ?>"><br><br>
            
            <input type="submit" name="extract_filename" value="Отримати ім'я файлу">
        </form>

        <?php
        if (isset($_POST['extract_filename'])) {
            $filepath = $_POST['filepath'] ?? '';
            
            // Витягуємо ім'я файлу без розширення
            $filename = pathinfo($filepath, PATHINFO_FILENAME);
            
            echo "<h3>Ім'я файлу без розширення:</h3>";
            echo "<textarea rows='1' cols='50' readonly>" . htmlspecialchars($filename) . "</textarea>";
        }
        ?>

        <hr>

        <!-- Завдання 4: Кількість днів між двома датами -->
        <h3>4. Кількість днів між двома датами</h3>
        <form method="post">
            <label for="date1">Перша дата (дд-мм-рррр):</label><br>
            <input type="text" name="date1" id="date1" placeholder="10-02-2015" value="<?php echo isset($_POST['date1']) ? htmlspecialchars($_POST['date1']) : ''; ?>"><br><br>
    
            <label for="date2">Друга дата (дд-мм-рррр):</label><br>
            <input type="text" name="date2" id="date2" placeholder="15-02-2015" value="<?php echo isset($_POST['date2']) ? htmlspecialchars($_POST['date2']) : ''; ?>"><br><br>
    
            <input type="submit" name="calculate_days" value="Обчислити різницю">
        </form>

        <?php
        if (isset($_POST['calculate_days'])) {
            $date1 = $_POST['date1'] ?? '';
            $date2 = $_POST['date2'] ?? '';
    
            // Перевірка правильного формату
            $format = 'd-m-Y';
            $d1 = DateTime::createFromFormat($format, $date1);
            $d2 = DateTime::createFromFormat($format, $date2);
    
            if ($d1 && $d2) {
                $interval = $d1->diff($d2);
                $daysDiff = $interval->days;
    
                echo "<h3>Кількість днів між датами:</h3>";
                echo "<textarea rows='1' cols='50' readonly>" . $daysDiff . " днів</textarea>";
            } else {
                echo "<h3 style='color: red;'>Невірний формат дати! Використовуйте дд-мм-рррр.</h3>";
            }
        }
        ?>

        <hr>

        <!-- Завдання 5: Генератор паролів та перевірка міцності -->
        <h3>5. Генератор паролів та перевірка міцності</h3>
        <form method="post">
            <label for="length">Введіть довжину пароля:</label><br>
            <input type="number" name="length" id="length" min="8" value="<?php echo isset($_POST['length']) ? htmlspecialchars($_POST['length']) : '8'; ?>"><br><br>
            
            <input type="submit" name="generate_password" value="Згенерувати пароль">
        </form>

        <?php
        if (isset($_POST['generate_password'])) {
            $length = $_POST['length'] ?? 8;
    
            // Генерація пароля
            function generatePassword($length) {
                $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-+=<>?';
                $password = '';
                for ($i = 0; $i < $length; $i++) {
                    $password .= $chars[rand(0, strlen($chars) - 1)];
                }
                return $password;
            }
    
            $password = generatePassword($length);
            
            echo "<h3>Згенерований пароль:</h3>";
            echo "<textarea rows='1' cols='50' readonly>" . htmlspecialchars($password) . "</textarea>";
        }
        ?>

        <hr>

        <form method="post">
            <label for="user_password">Введіть пароль для перевірки:</label><br>
            <input type="text" name="user_password" id="user_password" value="<?php echo isset($_POST['user_password']) ? htmlspecialchars($_POST['user_password']) : ''; ?>"><br><br>
            
            <input type="submit" name="check_password" value="Перевірити міцність пароля">
        </form>

        <?php
        if (isset($_POST['check_password'])) {
            $password = $_POST['user_password'] ?? '';
    
            // Перевірка пароля на міцність
            function checkPasswordStrength($password) {
                $hasUpperCase = preg_match('/[A-Z]/', $password);
                $hasLowerCase = preg_match('/[a-z]/', $password);
                $hasDigit = preg_match('/\d/', $password);
                $hasSpecialChar = preg_match('/[!@#$%^&*()_\-+=<>?]/', $password);
    
                return (strlen($password) >= 8 && $hasUpperCase && $hasLowerCase && $hasDigit && $hasSpecialChar);
            }
    
            if (checkPasswordStrength($password)) {
                echo "<h3>Пароль міцний!</h3>";
            } else {
                echo "<h3 style='color: red;'>Пароль не відповідає вимогам міцності! Він повинен містити: 1 велика літера, 1 мала літера, 1 цифра, 1 спеціальний символ та бути не менше 8 символів.</h3>";
            }
        }
        ?>
    </div>

    <hr>

    <!-- Блок 2: Завдання 6 і далі -->
    <div id="block2" class="task-block" style="display: none;">
        <h2>Блок 2: Завдання 6 і далі</h2>
 
                <!-- Завдання 6: Повторювані елементи в масиві -->
                <h3>6. Повторювані елементи в масиві</h3>
        <form method="post">
            <label for="array_input">Введіть елементи масиву через пробіл:</label><br>
            <input type="text" name="array_input" id="array_input" value="<?php echo isset($_POST['array_input']) ? htmlspecialchars($_POST['array_input']) : ''; ?>"><br><br>
            <input type="submit" name="find_duplicates" value="Знайти повтори">
        </form>

        <?php
        if (isset($_POST['find_duplicates'])) {
            // Отримуємо введений масив
            $arrayInput = $_POST['array_input'] ?? '';
            $array = explode(' ', $arrayInput);
            
            // Функція для пошуку повторюваних елементів
            function findDuplicates($array) {
                $duplicates = [];
                $counts = array_count_values($array); // Підраховуємо кількість кожного елемента
                foreach ($counts as $value => $count) {
                    if ($count > 1) {
                        $duplicates[] = $value; // Додаємо до результату, якщо елемент повторюється
                    }
                }
                return $duplicates;
            }

            // Знаходимо повтори
            $duplicates = findDuplicates($array);

            // Виводимо результат
            if (empty($duplicates)) {
                echo "<h3>Повторюваних елементів немає.</h3>";
            } else {
                echo "<h3>Повторювані елементи:</h3>";
                echo "<textarea rows='1' cols='50' readonly>" . implode(', ', $duplicates) . "</textarea>";
            }
        }
        ?>


        <!-- Завдання 7: Генератор імен тварин -->
        <h3>6. Генератор імен тварин</h3>
        <form method="post">
            <label for="animal_name_syllables">Введіть склади або символи для генерації імені:</label><br>
            <input type="text" name="animal_name_syllables" id="animal_name_syllables" value="<?php echo isset($_POST['animal_name_syllables']) ? htmlspecialchars($_POST['animal_name_syllables']) : ''; ?>"><br><br>
            <input type="submit" name="generate_animal_name" value="Згенерувати ім'я">
        </form>

        <?php
        if (isset($_POST['generate_animal_name'])) {
            $syllables = $_POST['animal_name_syllables'] ?? '';
            $syllableArray = explode(',', $syllables);
            $name = generateAnimalName($syllableArray);
            echo "<h3>Згенероване ім'я тварини:</h3>";
            echo "<textarea rows='1' cols='50' readonly>" . htmlspecialchars($name) . "</textarea>";
        }
    
        // Функція генерації імені тварини
        function generateAnimalName($syllables) {
            $name = '';
            $numSyllables = rand(2, 4); // Вибираємо випадкову кількість складів
            for ($i = 0; $i < $numSyllables; $i++) {
                $name .= $syllables[array_rand($syllables)];
            }
            return ucfirst($name);
        }
        ?>

        <hr>

        <!-- Завдання 8: Масиви з випадковими значеннями -->
        <h3>7. Масиви з випадковими значеннями</h3>
        <form method="post">
            <input type="submit" name="create_arrays" value="Створити та обробити масиви">
        </form>

        <?php
        if (isset($_POST['create_arrays'])) {
            // Створюємо масиви
            $array1 = createArray();
            $array2 = createArray();

            // З'єднуємо та обробляємо
            $resultArray = mergeAndProcessArrays($array1, $array2);

            echo "<h3>Масив 1:</h3><textarea rows='4' cols='50' readonly>" . implode(', ', $array1) . "</textarea>";
            echo "<h3>Масив 2:</h3><textarea rows='4' cols='50' readonly>" . implode(', ', $array2) . "</textarea>";
            echo "<h3>Оброблений масив:</h3><textarea rows='4' cols='50' readonly>" . implode(', ', $resultArray) . "</textarea>";
        }

        // Функція для створення масиву
        function createArray() {
            $length = rand(3, 7);
            $array = [];
            for ($i = 0; $i < $length; $i++) {
                $array[] = rand(10, 20);
            }
            return $array;
        }

        // Функція для злиття масивів і обробки
        function mergeAndProcessArrays($array1, $array2) {
            // З'єднуємо два масиви
            $mergedArray = array_merge($array1, $array2);

            // Видаляємо повтори
            $mergedArray = array_unique($mergedArray);

            // Сортуємо
            sort($mergedArray);

            return $mergedArray;
        }
        ?>

        <hr>

        <!-- Завдання 9: Асоціативний масив з користувачами -->
        <h3>8. Асоціативний масив з користувачами</h3>
        <form method="post">
            <label for="users">Введіть користувачів (ім’я:вік), через пробіл:</label><br>
            <input type="text" name="users" id="users" value="<?php echo isset($_POST['users']) ? htmlspecialchars($_POST['users']) : ''; ?>"><br><br>

            <label for="sort_by">Виберіть параметр для сортування:</label><br>
            <select name="sort_by" id="sort_by">
                <option value="name" <?php echo isset($_POST['sort_by']) && $_POST['sort_by'] == 'name' ? 'selected' : ''; ?>>За іменем</option>
                <option value="age" <?php echo isset($_POST['sort_by']) && $_POST['sort_by'] == 'age' ? 'selected' : ''; ?>>За віком</option>
            </select><br><br>
            
            <input type="submit" name="sort_users" value="Сортувати">
        </form>

        <?php
function sortUsers($users, $option) {
    if ($option == 1) {
        ksort($users); // Сортування за іменем
    } else {
        asort($users); // Сортування за віком
    }
    return $users;
}

$users = [
    "Олександр" => 25,
    "Марія" => 30,
    "Іван" => 22,
    "Андрій" => 28
];

$option = $_POST['sort_option'] ?? 1; // Отримання значення з форми

$sortedUsers = sortUsers($users, $option);
?>

<form method="POST">
    <label>Виберіть параметр для сортування:</label>
    <select name="sort_option">
        <option value="1" <?= $option == 1 ? 'selected' : '' ?>>За іменем</option>
        <option value="2" <?= $option == 2 ? 'selected' : '' ?>>За віком</option>
    </select>
    <button type="submit">Сортувати</button>
</form>

<h3>Відсортований список:</h3>
<ul>
    <?php foreach ($sortedUsers as $name => $age): ?>
        <li><?= "$name: $age років" ?></li>
    <?php endforeach; ?>
</ul>

    </div>

</body>
</html>
