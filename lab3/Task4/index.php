<?php
function uploadingPhoto($file)
{
    if (isset($file) && $file['error'] === UPLOAD_ERR_OK) {
        $uploadDirectory = './photos';
        if (!is_dir($uploadDirectory)) {
            mkdir($uploadDirectory, 0777, true);
        }

        do {
            $i = uniqid();
            $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
            $path = "$uploadDirectory/{$i}.$extension";
        } while (is_file($path));

        move_uploaded_file($file['tmp_name'], $path);
    } else {
        echo "Файл не був завантажений або виникла помилка.";
    }
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $photo = $_FILES["photo"];
    uploadingPhoto($photo);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Завантажити фото</title>
    <style>
        img {
            width: 350px;
            height: 350px;
            margin: 10px;
        }
    </style>
</head>

<body>
    <h1>Завантажити фото</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Загрузіть фото:</td>
                <td><input type="file" accept="image/png,.jpg" name="photo" id=""></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit">Send</button></td>
            </tr>
        </table>
    </form>
    <?php
    $path = "./photos";

    if (is_dir($path)) {
        $pathPhotos = scandir($path);
        for ($i = 2; $i < count($pathPhotos); $i++) {
            echo "<img src='$path/$pathPhotos[$i]' alt=''>";
        }
    } else {
        echo "Директорія 'photos' не існує.";
    }
    ?>
</body>

</html>