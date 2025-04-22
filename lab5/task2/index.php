<?php
require_once('delete.php');
require_once('change.php');

$pdo = new PDO('mysql:host=localhost;dbname=lab5;charset=utf8', 'homeuser', '123456');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$editId = $_GET['edit'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['save'])) {
        $selectedData = [
            'id' => $_POST['id'],
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'count' => $_POST['count'],
            'note' => $_POST['note']
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

$sql = "SELECT * FROM tov";
$userData = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <title>Товари</title>
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
    <h3>База даних з товарами</h3>
    <table class="bdtable">
        <tr>
            <th>Номер</th>
            <th>Назва</th>
            <th>Ціна</th>
            <th>Кількість</th>
            <th>Примітка</th>
            <th>Дії</th>
        </tr>
        <?php foreach ($userData as $row): ?>
            <tr>
                <?php if ($editId == $row['id']): ?>
                    <form method="POST">
                        <td><input type="text" name="id" value="<?= htmlspecialchars($row['id']) ?>" readonly></td>
                        <td><input type="text" name="name" value="<?= htmlspecialchars($row['name']) ?>"></td>
                        <td><input type="number" name="price" value="<?= htmlspecialchars($row['price']) ?>"></td>
                        <td><input type="number" name="count" value="<?= htmlspecialchars($row['count']) ?>"></td>
                        <td><input type="text" name="note" value="<?= htmlspecialchars($row['note']) ?>"></td>
                        <td>
                            <button type="submit" name="save" class="btn btn-save">Зберегти</button>
                        </td>
                    </form>
                <?php else: ?>
                    <form method="POST">
                        <td><?= $row['id'] ?><input type="hidden" name="id" value="<?= $row['id'] ?>"></td>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= $row['price'] ?></td>
                        <td><?= $row['count'] ?></td>
                        <td><?= htmlspecialchars($row['note']) ?></td>
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
</body>

</html>