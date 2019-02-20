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
//--------detail book
elseif($way=='detail'){
    if(isset($_GET['title'])){
        //----читаем название и выводим информацию об одной книге
        $title=$_GET['title'];//название книги
        $response = controllerBooks::detailBook($title);
    }else{
        $response = controllerBooks::error404();
    }
}

//====================countries and flags

elseif($way == 'Countries'){
    $response = controllerCountry::startSite();
}

//--------------country One filter
elseif($way == 'Country'){
    if(isset($_GET['name'])){
        $name = $_GET['name'];
        $response = controllerCountry::country($name);
    }else{
        $response = controllerBooks::error404();
    }//if
}//elseif

else{
    $response = controllerBooks::error404();
}

