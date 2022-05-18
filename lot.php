<?php
require_once('functions.php');
require_once('conn.php');
$id=$_GET['id'];
foreach ($goods as $good)
    if($good['id_lot']==$id){
        $lot=$good;
        break;
    }


$page_content = include_template('template_lot.php',  [
    'category' => $category,
    'lot' => $lot
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
