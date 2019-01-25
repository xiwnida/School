<?php

/* 
$_SERVER['REQUEST_URL'] - 
/index.php
/books
/book?name=BOOKNAME
 */

$host = explode('?', $_SERVER['REQUEST_URI'])[0];
//echo $host;
//     /JKTVR18_PHP/Teema4_ArrayMVC/MVC_BooksList/books
//Достать маршрут books
$n = substr_count($host, '/');
$way = explode('/', $host)[$n]; //books - маршрут
//Маршрут указывается в ссылках
//echo $way;

if($way == '' || $way == 'index.php' || $way == 'index'){
    $response = controllerBooks::startSite();
}
elseif($way == 'Books'){
    $response = controllerBooks::booksList();
}

else{
    $response = controllerBooks::error404();
}