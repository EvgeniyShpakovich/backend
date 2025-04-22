<?php

function WriteContentsInFile($filename, $name, $comment)
{
    file_put_contents($filename, "$name:$comment\n", FILE_APPEND);
}

function GetContentInFile($filename): array
{
    if (!file_exists($filename)) return [];

    $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $result = [];

    foreach ($lines as $line) {
        $parts = explode(":", $line, 2);
        if (count($parts) === 2) {
            $result[] = [
                'name' => htmlspecialchars($parts[0]),
                'comment' => htmlspecialchars($parts[1])
            ];
        }
    }

    return $result;
}

$filePath = "comments.txt";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $comment = trim($_POST['comment']);
    if ($name !== '' && $comment !== '') {
        WriteContentsInFile($filePath, $name, $comment);
    }
}

$comments = GetContentInFile($filePath);
?>

<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <title>Коментарі</title>
    <style>
        table {
            border-collapse: collapse;
            width: 60%;
            margin-top: 20px;
        }

        td,
        th {
            border: 1px solid #999;
            padding: 8px 12px;
            text-align: left;
        }

        th {
            background-color: #f0f0f0;
        }

        form {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <h2>Залишити коментар</h2>
    <form action="" method="POST">
        <table>
            <tr>
                <td>Ім'я:</td>
                <td><input type="text" name="name" required></td>
            </tr>
            <tr>
                <td>Коментар:</td>
                <td><input type="text" name="comment" required></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit">Надіслати</button></td>
            </tr>
        </table>
    </form>

    <?php if (!empty($comments)) : ?>
        <h3>Усі коментарі:</h3>
        <table>
            <tr>
                <th>Ім'я</th>
                <th>Коментар</th>
            </tr>
            <?php foreach ($comments as $entry): ?>
                <tr>
                    <td><?= $entry['name'] ?></td>
                    <td><?= $entry['comment'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>Поки що коментарів немає.</p>
    <?php endif; ?>
</body>

</html>