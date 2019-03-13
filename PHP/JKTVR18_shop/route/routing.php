<?php

$host = explode('?', $_SERVER['REQUEST_URI'])[0];
$num = substr_count($host, '/'); //количество слешей, чтобы найти маршрут
$path = explode('/', $host)[$num];

//-------------------------------

if($path == '' || $path == 'index.php' || $path == 'index'){
    //---главная страница
    
    $response = ProductController::StartSite();
    
}elseif($path == 'category' && isset ($_GET['id'])) {
    $response = ProductController::ProductCategory($_GET['id']);
    
}elseif($path == 'type' && isset ($_GET['id'])) {
    $response = ProductController::ProductType($_GET['id']);
}