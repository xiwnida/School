<?php

class ProductModel {
    // список категорий
    public static function getCategoryList (){
        $sql = 'SELECT * FROM `category` ORDER BY `category`.`nameCategory` ASC';
        $db = new database(); // соединение с базой данных
        $rows = $db -> getAll($sql);
        return $rows;
    } // public static function getCategoryList
    
    // список типов
    public static function getTypeList (){
        $sql = 'SELECT * FROM `type` ORDER BY `type`.`nameType` ASC';
        $db = new database(); // соединение с базой данных
        $rows = $db -> getAll($sql);
        return $rows;
    }
    
    // список продуктов
    public static function getProductList(){
        $sql = 'SELECT * FROM `product` ORDER BY `product`.`nameProduct` ASC';
        $db = new database(); // соединение с базой данных
        $rows = $db -> getAll($sql);
        return $rows;
    }
    
    // --- список продуктов по категории
    public static function getProductCategory($id){
        $sql = 'SELECT * FROM `product` WHERE `idCategory`='.$id;
        $db = new database(); // соединение с базой данных
        $rows = $db -> getAll($sql);
        return $rows;
    }
    
    // --- список продуктов по типам
    public static function getProductType($id){
        $sql = 'SELECT * FROM `product` WHERE `idType`='.$id;
        $db = new database(); // соединение с базой данных
        $rows = $db -> getAll($sql);
        return $rows;
    }
    
    // --- one row
    public static function getProductDetail($id){
        $sql = 'SELECT * FROM `product` WHERE `idProduct`='.$id;
        $db = new database(); // соединение с базой данных
        $row = $db -> getOne($sql);
        return $row;
    }
    
    //-----------product by ids
    public static function getProductsByIds($productIds) {
        $idsString = implode(',', $productIds); //5,2   - $productIds  - array [0] =>5, [1] =>2
        $sql = "SELECT * FROM `product` WHERE `idProduct` IN($idsString)";
        $db = new database();
        $rows = $db->getAll($sql);
        return $rows;
    }
    
} // class ProductModel
