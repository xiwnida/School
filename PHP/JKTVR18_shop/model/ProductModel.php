<?php

class ProductModel {
    //Список категорий
    
    public static function GetCategoryList() {
        $sql = 'SELECT * FROM `category` ORDER BY `nameCategory` ASC';
        $db = new database();//соединение с базой данных
        $rows = $db->getAll($sql);
        
        return $rows;
    }
    
    public static function GetTypeList() {
        $sql = 'SELECT * FROM `type` ORDER BY `nameType` ASC';
        $db = new database();//соединение с базой данных
        $rows = $db->getAll($sql);
        
        return $rows;
    }
    
    public static function GetProductList() {
        $sql = 'SELECT * FROM `product` ORDER BY `nameProduct` ASC';
        $db = new database();//соединение с базой данных
        $rows = $db->getAll($sql);
        
        return $rows;
    }
    
    //by category
    public static function GetProductCategory($id) {
        $sql = 'SELECT * FROM `product` WHERE `idCategory`='.$id;
        $db = new database();//соединение с базой данных
        $rows = $db->getAll($sql);
        
        return $rows;
    }
    
    //by type
    public static function GetProductType($id) {
        $sql = 'SELECT * FROM `product` WHERE `idType`='.$id;
        $db = new database();//соединение с базой данных
        $rows = $db->getAll($sql);
        
        return $rows;
    }
}
