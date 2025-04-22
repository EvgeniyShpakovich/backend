<?php
require_once('delete.php');
require_once('change.php');

$pdo = new PDO('mysql:host=localhost;dbname=company_db;charset=utf8', 'homeuser', '123456');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$editId = $_GET['edit'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['save'])) {
        $selectedData = [
            'id' => $_POST['id'],
            'name' => $_POST['name'],
            'position' => $_POST['position'],
            'salary' => $_POST['salary']
        ];
        changeRow($pdo, $selectedData);
        header("Location: index.php");
        exit;
    }

    if (isset($_POST['delete'])) {
        deleteRow($pdo, [$_POST['id']]);
        header("Location: index.php");
        exit;
    }

    if (isset($_POST["add"])) {
        header("Location: insert.php");
        exit;
    }
}

$sql = "SELECT * FROM employees";
$userData = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <title>Працівники</title>
    <style>
        .bdtable {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        th,
        td {
            border: 1px solid gray;
            padding: 8px;
        }

        th {
            background: #f2f2f2;
            font-size: 20px;
        }

        td {
            font-size: 18px;
        }

        tr:nth-child(odd) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: lightgray;
        }

        input[type="text"],
        input[type="number"] {
            width: 100px;
        }

        .btn {
            padding: 5px 10px;
            margin: 2px;
            border: none;
            cursor: pointer;
        }

        .btn-edit {
            background-color: lightblue;
            text-decoration: none;
            color: black;
            font-size: 18px;
        }

        .btn-save {
            background-color: lightgreen;
            font-size: 18px;
        }

        .btn-delete {
            background-color: salmon;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <h3>База даних працівників</h3>
    <table class="bdtable">
        <tr>
            <th>Номер</th>
            <th>Ім'я</th>
            <th>Посада</th>
            <th>Зарплата</th>
            <th>Дії</th>
        </tr>
        <?php foreach ($userData as $row): ?>
            <tr>
                <?php if ($editId == $row['id']): ?>
                    <form method="POST">
                        <td><input type="number" name="id" value="<?= htmlspecialchars($row['id']) ?>" readonly></td>
                        <td><input type="text" name="name" value="<?= htmlspecialchars($row['name']) ?>"></td>
                        <td><input type="text" name="position" value="<?= htmlspecialchars($row['position']) ?>"></td>
                        <td><input type="number" step="0.01" name="salary" value="<?= htmlspecialchars($row['salary']) ?>"></td>
                        <td>
                            <button type="submit" name="save" class="btn btn-save">Зберегти</button>
                        </td>
                    </form>
                <?php else: ?>
                    <form method="POST">
                        <td><?= $row['id'] ?><input type="hidden" name="id" value="<?= $row['id'] ?>"></td>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= htmlspecialchars($row['position']) ?></td>
                        <td><?= $row['salary'] ?></td>
                        <td>
                            <a href="?edit=<?= $row['id'] ?>" class="btn btn-edit">Редагувати</a>
                            <button type="submit" name="delete" class="btn btn-delete">Видалити</button>
                        </td>
                    </form>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </table>

    <form method="POST" style="margin-top: 20px;">
        <input type="submit" name="add" value="Додати запис" class="btn btn-edit">
    </form>
    <?php
    if (!isset($_POST['edit'])) {
        echo "<h2>Статистика</h2>";
        echo "<div class='con-statistics'>";
        $sqlAvgSalary = "SELECT AVG(salary) AS average_salary FROM employees";
        $sthAvg = $pdo->prepare($sqlAvgSalary);
        $sthAvg->execute();
        $avgSalary = $sthAvg->fetch(PDO::FETCH_ASSOC);

        echo "<div>Середня зарплата всіх працівників: " . round($avgSalary['average_salary'], 2) . "</div>";

        $sqlPositionCount = "SELECT position, COUNT(*) AS count FROM employees GROUP BY position";
        $sthCount = $pdo->prepare($sqlPositionCount);
        $sthCount->execute();
        $positionCounts = $sthCount->fetchAll(PDO::FETCH_ASSOC);

        echo "<p>Кількість працівників на кожній посаді:</p>";
        echo "<ul>";
        foreach ($positionCounts as $positionCount) {
            echo "<li>" . $positionCount['position'] . ": " . $positionCount['count'] . "</li>";
        }
        echo "</ul>";
    }
    ?>
</body>

</html>