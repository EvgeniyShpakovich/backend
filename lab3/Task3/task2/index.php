<?php

$filePath1 = './files/file1.txt';
$filePath2 = './files/file2.txt';
$contents1 = file_get_contents($filePath1);
$contents1 = explode(" ", $contents1);
$contents2 = file_get_contents($filePath2);
$contents2 = explode(" ", $contents2);
function outputFile($filePath)
{
    $contents = file_get_contents($filePath);
    $contents = explode(" ", $contents);
    echo "<div><h3>" . basename($filePath) . "</h3>";
    for ($i = 0; $i < count($contents); $i++) {
        echo "$contents[$i]<br>";
    }
    echo "</div>";
}
function wordsOnlyFirstFile($contents1, $contents2, $path): array
{
    $contentsUniqued = [];
    foreach ($contents1 as $key) {
        if (!in_array($key, $contents2)) {
            $contentsUniqued[] = $key;
        }
    }
    file_put_contents($path, implode(' ', $contentsUniqued));
    return $contentsUniqued;
}
function wordsTwoFiles($contents1, $contents2, $path): array
{
    $contents = [];
    foreach ($contents1 as $key) {
        if (in_array($key, $contents2)) {
            $contents[] = $key;
        }
    }
    file_put_contents($path, implode(' ', $contents));
    return $contents;
}
function wordsMoreTwoTimes($contents1, $contents2, $path): array
{
    $wordCounts1 = array_count_values($contents1);

    $wordCounts2 = array_count_values($contents2);
    $repeatedWords = [];

    foreach ($wordCounts1 as $word => $count) {
        if (isset($wordCounts2[$word]) && ($count + $wordCounts2[$word]) > 2) {
            $repeatedWords[] = $word;
        }
    }
    file_put_contents($path, implode(' ', $repeatedWords));
    return $repeatedWords;
}
function deleteFile($filename)
{
    $fullPath = "./files/filesForFunction/$filename.txt";
    if (!empty($filename) && file_exists($fullPath)) {
        unlink($fullPath);
    }
}

echo "<div style='display:flex; justify-content: space-around; flex-direction:row'>";
outputFile($filePath1);
outputFile($filePath2);
echo "</div>";

$filePath_wordsOnlyFirstFile = '.\files\filesForFunction\wordsOnlyFirstFile.txt';
$filePath_wordsTwoFiles = '.\files\filesForFunction\wordsTwoFiles.txt';
$filePath_wordsMoreTwoTimes = '.\files\filesForFunction\wordsMoreTwoTimes.txt';
$filePath_delete = $_POST['fileName'] ?? null;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>
    <form action="" method="POST">
        <table>
            <tr>
                <td><input type="submit" value="Рядки, які зустрічаються тільки в першому файлі" name="wordsOnlyFirstFile"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Рядки, які зустрічаються в обох файлах" name="wordsTwoFiles"></td>
            </tr>
            <tr>
                <td><input type="submit" value="рядки, які зустрічаються в кожному файлі більше двох разів" name="wordsMoreTwoTimes"></td>
            </tr>
            <tr>
                <td>Введіть слово, яке бажаєте видалити</td>
                <td><input type="text" name="fileName"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Видалити"></td>
            </tr>
        </table>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        deleteFile($filePath_delete);
        if (isset($_POST["wordsOnlyFirstFile"])) {
            $wordsOnlyFirstFile = wordsOnlyFirstFile($contents1, $contents2, $filePath_wordsOnlyFirstFile);
        }
        if (isset($_POST["wordsTwoFiles"])) {
            $wordsTwoFiles = wordsTwoFiles($contents1, $contents2, $filePath_wordsTwoFiles);
        }
        if (isset($_POST["wordsMoreTwoTimes"])) {
            $wordsMoreTwoTimes =  wordsMoreTwoTimes($contents1, $contents2, $filePath_wordsMoreTwoTimes);
        }
    }
    echo "<div style='display:flex; justify-content: space-around; flex-direction:row;'>";
    if (is_file($filePath_wordsOnlyFirstFile)) {
        outputFile($filePath_wordsOnlyFirstFile);
    }
    if (is_file($filePath_wordsTwoFiles)) {
        outputFile($filePath_wordsTwoFiles);
    }
    if (is_file($filePath_wordsMoreTwoTimes)) {
        outputFile($filePath_wordsMoreTwoTimes);
    }
    echo "</div>";
    ?>
</body>

</html>