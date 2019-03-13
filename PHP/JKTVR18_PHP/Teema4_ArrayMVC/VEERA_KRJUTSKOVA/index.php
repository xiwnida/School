<?php

/* 
Сборка всех файлов
 */

include_once 'model/modelCountry.php';
include_once 'controller/controllerCountry.php';

include_once 'model/modelNews.php';
include_once 'controller/controllerNews.php';

include_once 'route/routing.php';
if(isset($response)){
    echo $response;
}