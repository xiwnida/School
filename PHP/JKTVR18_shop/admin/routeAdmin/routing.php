<?php
$host = explode('?', $_SERVER['REQUEST_URI'])[0];
$num=substr_count($host,'/');
$path  = explode('/', $host)[$num];

if($path == '' OR $path == 'index.php'){
    $response = adminController::formLogin();
}
elseif($path == 'loginResult'){
    $response = adminController::loginResult();
}
elseif($path == 'logout'){
    $response = adminController::logoutResult();
}
elseif($path == 'productAction'){
    $response = AdminProductController::ProductList();
}

else{
    
}