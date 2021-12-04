<?php

function print_debug($data){
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
}

$user = 'root';
$pass = '';
$db = 'ch82817_fuel';

$connect = mysqli_connect('localhost', $user, $pass, $db) or die("Don't connect");

function getTitlesArray($connect){
    $title_arr = array();
    $query = mysqli_query($connect, "SELECT * FROM `modx_site_tmplvar_contentvalues` WHERE `tmplvarid` = 1 LIMIT 10000 OFFSET 60000");
    while ($row = mysqli_fetch_assoc($query)){
        $title_arr[] = array(
          'id' => $row['contentid'],
           'value' => $row['value'],
        );
    }
    foreach ($title_arr as $item){
        mysqli_query($connect, "UPDATE `content` SET `meta_title` ='".$item['value']."' WHERE `id` ={$item['id']} ");
    }
    return $title_arr;
}


function getDescriptionsArray($connect){
    $description_arr = array();
    $query = mysqli_query($connect, "SELECT * FROM `modx_site_tmplvar_contentvalues` WHERE `tmplvarid` = 2 LIMIT 10000 OFFSET 60000");
    while ($row = mysqli_fetch_assoc($query)){
        $description_arr[] = array(
            'id' => $row['contentid'],
            'value' => $row['value'],
        );
    }
    foreach ($description_arr as $item){
        mysqli_query($connect, "UPDATE `content` SET `meta_description` ='".$item['value']."' WHERE `id` ={$item['id']} ");
    }
    return $description_arr;
}

//print_debug(getDescriptionsArray($connect));