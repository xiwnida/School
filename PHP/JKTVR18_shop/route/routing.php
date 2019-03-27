<?php

$host = explode('?', $_SERVER['REQUEST_URI'])[0];
$num = substr_count($host, '/'); // количество slash, чтобы найти маршрут
$path = explode('/', $host)[$num];

//---------------

if ($path == '' || $path == 'index.php' || $path == 'index') {

// главная страница

    $response = ProductController::startSite();
} elseif ($path == 'category' && isset($_GET['id'])) {

    $response = ProductController::ProductCategory($_GET['id']);
} elseif ($path == 'type' && isset($_GET['id'])) {

    $response = ProductController::ProductType($_GET['id']);
} elseif ($path == 'detail' && isset($_GET['id'])) {
    // $_GET['id'] - id продукта

    $response = ProductController::ProductDetail($_GET['id']);
}

// --- register, login, lohout, form
elseif ($path == 'loginForm') {
    //2 пустые формы Login и SignIn
    $response = MainController::LoginSignIn();
}
// --- registerResult
elseif ($path == 'registerResult') {
    $response = MainController::registerResult();
} elseif ($path == 'logout') {

    MainController::logoutAction();
}
// Login Result
elseif ($path == 'LoginResult') {
    $response = MainController::LoginResult();
}
// CART
elseif ($path == 'cartAdd' && $_GET['id']) {
    CartController::actionAdd($_GET['id']);
    print_r($_SESSION['products']);
    $response = ProductController::ProductDetail($_GET['id']);
}
//------------cart view
elseif ($path == 'cart') {
    $response = CartController::cartView();
}

elseif ($path == 'cartClear') {
    CartController::actionCartClear();
    $response = CartController::cartView();
}