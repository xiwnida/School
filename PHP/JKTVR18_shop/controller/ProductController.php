<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductController
 *
 * @author Reshetnikov
 */
class ProductController {
    // список категорий для меню
    public static function CategoryList(){
        $CategoryList = ProductModel::getCategoryList();
        include_once 'view/CategoryList.php';
        return $CategoryMenu;
    } // public static function CategoryList
      // --- type
    public static function TypeList(){
        $typeList = ProductModel::getTypeList();
        include_once 'view/TypeList.php';
        return $TypeMenu;
    } // public static function TypeList    
    
    
    // --- startSite
    
    public static function startSite(){
        $CategoryMenu = ProductController::CategoryList(); // меню по категориям
        $TypeMenu = ProductController::TypeList();
        //products - получить данные
        $productList = ProductModel::getProductList();
        
        include_once 'view/product.php';
    } // public static function startSite
    
    // --- ProductCategory
    
    public static function ProductCategory($id){
        $CategoryMenu = ProductController::CategoryList(); // меню по категориям
        $TypeMenu = ProductController::TypeList();
        // model id - номер категории товаров
        $productList = ProductModel::getProductCategory($id);
        include_once 'view/product.php';
    }
    
    // --- ProductType
    
    public static function ProductType($id){
        $CategoryMenu = ProductController::CategoryList(); // меню по категориям
        $TypeMenu = ProductController::TypeList(); // type menu
        // model id - номер категории товаров
        $productList = ProductModel::getProductType($id);
        include_once 'view/product.php';
    }
    
    // --- ProductDetail
    
    public static function ProductDetail($id){
        $CategoryMenu = ProductController::CategoryList(); // меню по категориям
        $TypeMenu = ProductController::TypeList(); //type menu
        // model - один товар
        $product = ProductModel::getProductDetail($id);
        include_once 'view/productDetail.php';
     }
     
} // class ProductController
