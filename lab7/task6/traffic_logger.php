<?php
$db = new PDO('mysql:host=localhost;dbname=lab7;charset=utf8', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$ip = $_SERVER['REMOTE_ADDR'];
$rawUrl = $_SERVER['REQUEST_URI'];
$parsedUrl = parse_url($rawUrl, PHP_URL_PATH);
$url = $parsedUrl ?: $rawUrl;
$time = date('Y-m-d H:i:s');

$requestedFile = $_SERVER['DOCUMENT_ROOT'] . $url;

if (file_exists($requestedFile) && !is_dir($requestedFile)) {
    $status = 200;
} else {
    $status = 404;
}

$stmt = $db->prepare("INSERT INTO logs (ip, request_time, url, status) VALUES (?, ?, ?, ?)");
$stmt->execute([$ip, $time, $rawUrl, $status]);

http_response_code($status);

if ($status === 404) {
    include __DIR__ . '/404.php';
    exit;
}

$extension = pathinfo($requestedFile, PATHINFO_EXTENSION);
if ($extension === 'php') {
    include $requestedFile;
} else {
    header('Content-Type: ' . mime_content_type($requestedFile));
    readfile($requestedFile);
}
exit;
