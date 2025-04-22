<?php
$cache_file = 'cache.html';

function generatePageContent($title, $text)
{
    $content = '<h1>' . $title . '</h1>';
    $content .= '<p>' . $text . '</p>';
    return $content;
}

if (file_exists($cache_file)) {
    echo file_get_contents($cache_file);
    exit;
}
ob_start();

$pageExists = isset($_GET['page']) && $_GET['page'] === 'exists';

if ($pageExists) {
    http_response_code(200);
    $content = generatePageContent("Some page", "Text");
    echo $content;
} else {
    http_response_code(404);
    echo '<h1>404 Not Found</h1>';
    echo '<p>Сторінку не знайдено.</p>';
}

$content = ob_get_contents();
ob_end_flush();

if (http_response_code() === 200) {
    file_put_contents($cache_file, $content);
} elseif (http_response_code() === 404 && file_exists($cache_file)) {
    unlink($cache_file);
}
