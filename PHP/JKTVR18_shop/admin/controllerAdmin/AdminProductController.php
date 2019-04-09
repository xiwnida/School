<?php

class AdminProductController {
    public static function ProductList() {
        $products = AdminProductModel::getProductList();
        include_once 'viewAdmin/AdminProductList.php;';
    }
}
