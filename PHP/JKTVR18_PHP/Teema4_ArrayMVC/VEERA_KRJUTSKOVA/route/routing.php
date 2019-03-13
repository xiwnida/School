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
    $response = controllerCountry::startSite();
}
elseif($way == 'Country'){
    $response = controllerCountry::countrysList();
    
}
//--------detail book
elseif($way=='detail'){
    if(isset($_GET['title'])){
        //----читаем название и выводим информацию об одной книге
        $title=$_GET['title'];//название книги
        $response = controllerCountry::detailCountry($title);
    }else{
        $response = controllerCountry::error404();
    }
}

//====================countries and flags

elseif($way == 'News'){
    $response = controllerNews::startSite();
}

//--------------country One filter
elseif($way == 'read'){
    if(isset($_GET['name'])){
        $name = $_GET['name'];
        $response = controllerNews::news($name);
    }else{
        $response = controllerCountry::error404();
    }//if
}//elseif

else{
    $response = controllerCountry::error404();
}

