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
        $sql = "SELECT product.*,category.*,type.* FROM product,category,type WHERE product.idCategory=category.idCategory and product.idType=type.idType";
        $db = new database();
        $rows = $db->getAll($sql);
        return $rows;
    }
}
