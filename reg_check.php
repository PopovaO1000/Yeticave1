<?php
require_once('functions.php');
require_once('conn.php');


$i=0;
$s="";
$form_class = "";
$div_class = array("","");
$check = false;

$form_items = array($_POST['email'],$_POST['password'],$_POST['name'],$_POST['message']);

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
    $page_content = include_template('template_sign-up.php',  [
        'category' => $category,
        'form_class' => $form_class,
        'div_class' => $div_class,
        'form_items' => $form_items
    ]);
    $layout_content = include_template('layout.php', [
        'content' => $page_content,
        'page_name' => 'Регистрация',
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
        $form_class = "form--invalid";
        $div_class[1] = "form__item--invalid";
        $email_error = 'Такой пользователь уже существует';
        $page_content = include_template('template_sign-up.php',  [
            'category' => $category,
            'form_class' => $form_class,
            'div_class' => $div_class,
            'form_items' => $form_items,
            'password_error' => $password_error,
            'email_error' => $email_error
        ]);
        $layout_content = include_template('layout.php', [
            'content' => $page_content,
            'page_name' => 'Регистрация',
            'is_auth' => $is_auth,
            'user_name' => $user_name,
            'category' => $category
        ]);
        print($layout_content);
    }
    else{
        $uploaddir = 'img/';
        $uploadfile = $uploaddir . basename($_FILES['lot-img']['name']);
        move_uploaded_file($_FILES['lot-img']['tmp_name'], $uploadfile);
        if(filter_var($form_items[0],FILTER_VALIDATE_EMAIL)==$form_items[0] /*&& (mime_content_type($uploadfile)=="image/png" || mime_content_type($uploadfile)=="image/jpeg")*/){
            move_uploaded_file($_FILES['lot-img']['tmp_name'], $uploadfile);
            $passw = password_hash($form_items[1],PASSWORD_BCRYPT);
            $sql = "INSERT INTO `user` (`reg_date`, `email`, `login`, `password`, `avatar`, `contacts`) VALUES ('2022-05-15', '$form_items[1]', '$form_items[3]', '$passw', '$uploadfile', '$form_items[3]')";
            $result = mysqli_query($link, $sql);
            setcookie('user',$form_items[2],time()+3600,'/');
            header('Location: ../index.php');
        }
        else{
            $form_class = "form--invalid";
            $div_class[1] = "form__item--invalid";
            $page_content = include_template('template_sign-up.php',  [
                'category' => $category,
                'form_class' => $form_class,
                'div_class' => $div_class,
                'form_items' => $form_items,
                'password_error' => $password_error,
                'email_error' => $email_error
            ]);
            $layout_content = include_template('layout.php', [
                'content' => $page_content,
                'page_name' => 'Регистрация',
                'is_auth' => $is_auth,
                'user_name' => $user_name,
                'category' => $category
            ]);
            print($layout_content);
        }
    }
}
