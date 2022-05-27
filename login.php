<?php
require_once('functions.php');
require_once('conn.php');

$form_class = "";
$div_class = "";
$form_items = "";
$password_error = '';
$email_error = '';
$page_content = include_template('template_login.php',  [
    'category' => $category,
    'form_class' => $form_class,
    'div_class' => $div_class,
    'form_items' => $form_items,
    'password_error' => $password_error,
    'email_error' => $email_error
]);
$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'page_name' => 'Авторизация',
    'is_auth' => $is_auth,
    'user_name' => $user_name,
    'category' => $category,
    'form_class' => $form_class,
    'div_class' => $div_class
]);

print($layout_content);
?>
