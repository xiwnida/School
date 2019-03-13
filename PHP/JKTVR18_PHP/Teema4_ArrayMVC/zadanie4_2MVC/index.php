<?php

/* 
 Сборка всех файлов
 */

include_once 'model/modelClass.php';
include_once 'controller/controllerClass.php';

include_once 'model/modelDepts.php';
include_once 'controller/controllerDepts.php';

include_once 'model/modelBeasts.php';
include_once 'controller/controllerBeasts.php';

include_once 'route/routing.php';
if(isset($response)){
echo $response;
}
