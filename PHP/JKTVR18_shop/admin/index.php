<?php
//начало сессии
session_start();
    include_once '../inc/database.php';
    include_once '../model/MainModel.php'; //aut admin
    include_once 'modelAdmin/AdminModel.php';
    include_once 'modelAdmin/AdminProductModel.php';
    
    //----controllers
    include_once 'controllerAdmin/AdminController.php';
    include_once 'controllerAdmin/AdminProductController.php';
    
    
    include_once 'routeAdmin/routing.php';

    echo $response;
?>
