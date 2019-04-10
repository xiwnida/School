<?php

class AdminProductController {
    public static function ProductList() {
        $products = AdminProductModel::getProductList();
        include_once 'viewAdmin/AdminProductList.php';
    }
    
    public static function AddProductForm() {
        $categoryList = ProductModel::getCategoryList();
        $typeList = ProductModel::getTypeList();
        
        include_once 'viewAdmin/addProductForm.php';
    }
    
    public static function AddProductResult() {
        $test = AdminProductModel::productAdd();
        include_once 'viewAdmin/resultForm.php';
    }
    
    //---------edit
    public static function EditProductForm($id){
        $categoryList = ProductModel::getCategoryList();
        $typeList = ProductModel::getTypeList();
        
        $product= ProductModel::getProductDetail($id);
        
        include_once 'viewAdmin/editProductForm.php';
    }
}
