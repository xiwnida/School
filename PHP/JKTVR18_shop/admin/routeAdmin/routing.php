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
elseif($path == 'addProduct'){
    $response = AdminProductController::AddProductForm();
}
elseif($path == 'addProductResult'){
    $response = AdminProductController::AddProductResult();
}

elseif($path = 'editProduct' && isset($_GET['id'])){
    $response = AdminProductController::EditProductForm($_GET['id']);
}
elseif($path = 'editProductResult' && isset($_GET['id'])){
    $response = AdminProductController::EditProductResult($_GET['id']);
}
else{
    
}