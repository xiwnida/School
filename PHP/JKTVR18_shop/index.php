<?php

session_start();
#session_destroy();

include_once 'inc/database.php';

include_once 'model/MainModel.php';
include_once 'model/ProductModel.php';
include_once 'model/CartModel.php';


include_once 'controller/MainController.php';
include_once 'controller/ProductController.php';
include_once 'controller/CartController.php';

include_once 'route/routing.php';

echo $response;
?>