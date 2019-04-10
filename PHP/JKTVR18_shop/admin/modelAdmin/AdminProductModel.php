<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminProductModel
 *
 * @author pupil
 */
class AdminProductModel {
    public static function getProductList() {
        $sql = "SELECT product.*,category.*,type.* FROM product,category,type WHERE product.idCategory=category.idCategory and product.idType=type.idType ORDER BY product.nameProduct ASC";
        $db = new database();
        $rows = $db->getAll($sql);
        return $rows;
    }
    
    public static function productAdd() {
        //Обработка формы
        $test = false;
        if(isset($_POST['send'])){
            $nameProduct = $_POST['nameProduct'];
            $price = $_POST['price'];
            $idCategory = $_POST['idCategory'];
            $idType = $_POST['idType'];
            $picture = $_FILES['picture']['name'];
            
            if($picture){
                $upload='../images/'.basename($_FILES['picture']['name']);
                copy($_FILES['picture']['tmp_name'], $upload);
            }
            
            $sql = "INSERT INTO `product` (`idProduct`, `nameProduct`, `idCategory`, `idType`, `price`, `picture`) VALUES (NULL, '$nameProduct', '$idCategory', '$idType', '$price', '$picture');";
            $db = new database();
            $result = $db->executeRun($sql);
            
            if ($result){
                $test = true;
            }
        }
        
        return $test;
    }
}
