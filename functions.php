<?php
function include_template($name, $data) {
    $name = 'templates/' . $name;
    $result = '';
    if (!file_exists($name)) {
        return $result;
    }
    ob_start();
    extract($data);
    require($name);
    $result = ob_get_clean();
    return $result;
}
function num_format($cost)
{
    $cost = ceil($cost);
    if($cost>1000)
        $cost = number_format($cost,0,""," ");
    $cost .= '<b class="rub">р</b>';
    return $cost;
}

function time_form()
{
    $time2 = strtotime('2022-05-13 24:00');
    $time1 = time();
    $diff = $time2 - $time1;
    return gmdate('H:i', $diff);
}

$is_auth = rand(0, 1);
$user_name = 'Olya'; // укажите здесь ваше имя
/*
$category = array("boards" =>'Доски и лыжи',"boots" =>'Ботинки',"clothing" =>'Одежда',"tools" =>'Инструменты',"other" =>'Разное');
$goods = array(array("name" => "2014 Rossignol District Snowboard", "category" => "Доски и лыжи" , "cost" => 10999, "URL" => "img/lot-1.jpg"),
    array("name" => "DC Ply Mens 2016/2017 Snowboard", "category" => "Доски и лыжи" , "cost" => 159999, "URL" => "img/lot-2.jpg"),
    array("name" => "Крепления Union Contact Pro 2015 года размер L/XL", "category" => "Крепления" , "cost" => 8000, "URL" => "img/lot-3.jpg"),
    array("name" => "Ботинки для сноуборда DC Mutiny Charocal", "category" => "Ботинки" , "cost" => 10999, "URL" => "img/lot-4.jpg"),
    array("name" => "Куртка для сноуборда DC Mutiny Charocal", "category" => "Одежда" , "cost" => 7500, "URL" => "img/lot-5.jpg"),
    array("name" => "Маска Oakley Canopy", "category" => "Разное" , "cost" => 5400, "URL" => "img/lot-6.jpg"));
*/
