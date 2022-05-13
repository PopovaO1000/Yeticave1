<?php
require_once('functions.php');

$page_content = include_template('index.php',  [
    'category' => $category,
    'goods' => $goods
]);
$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'page_name' => 'Главная страница',
    'is_auth' => $is_auth,
    'user_name' => $user_name,
    'category' => $category
]);

print($layout_content);
?>

