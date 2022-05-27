<?php
require_once('functions.php');
require_once('conn.php');


$i=0;
$s="";
$form_class = "";
$div_class = array("","");
$check = false;
$password_error = '';
$email_error = '';

$form_items = array($_POST['email'],$_POST['password']);

foreach ($form_items as $form_item){
    $i++;
    if($form_item==''){
        $form_class = "form--invalid";
        $div_class[$i] = "form__item--invalid";
        $check = true;
    }
}
if($check){
    $password_error = 'Введите пароль';
    $email_error = 'Введите email';
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
        'category' => $category
    ]);
    print($layout_content);
}
else{
    $sql = "SELECT * FROM user WHERE email = '$form_items[0]'";
    $result = mysqli_query($link, $sql);
    if($user = $result->fetch_assoc()){
        if($user['password'] == $form_items[1]){
            setcookie('user',$user['login'],time()+3600,'/');
            header('Location: ../index.php');
        }
        else{
            $form_class = "form--invalid";
            $div_class[2] = "form__item--invalid";
            $password_error = 'Неверный пароль';
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
                'category' => $category
            ]);
            print($layout_content);
        }
    }
    else{
        $form_class = "form--invalid";
        $div_class[1] = "form__item--invalid";
        $email_error = 'Данного пользователя не существует';
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
            'category' => $category
        ]);
        print($layout_content);
    }
}



