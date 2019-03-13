<?php

class ProductController {
    //список категорий для меню
    
    public static function CategoryList() {
        $categoryList = ProductModel::GetCategoryList();
        include_once 'view/CategoryList.php';
        return $categoryMenu;
    }//CategoryList
    
    public static function TypeList() {
        $typeList = ProductModel::GetTypeList();
        include_once 'view/TypeList.php';
        return $typeMenu;
    }//CategoryList
    
    //-----------Start site
    
    public static function StartSite() {
        $categoryMenu = ProductController::CategoryList();//menu по категориям
        $typeMenu = ProductController::TypeList();//menu по категориям
        
        $productList = ProductModel::GetProductList();;
        include_once 'view/Product.php';
    }
    
    //-------------product category
    
    public static function ProductCategory($id){
        $categoryMenu = ProductController::CategoryList();//menu по категориям
        $typeMenu = ProductController::TypeList();//menu по категориям
        //model
        $productList = ProductModel::GetProductCategory($id);
        include_once 'view/Product.php';
    }
    
    //-------------product category
    
    public static function ProductType($id){
        $categoryMenu = ProductController::CategoryList();//menu по категориям
        $typeMenu = ProductController::TypeList();//menu по категориям
        //model
        $productList = ProductModel::GetProductType($id);
        include_once 'view/Product.php';
    }
}//class
