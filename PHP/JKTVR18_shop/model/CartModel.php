<?php

class CartModel {
    // --- addproduct
    public static function addProduct($id){
        // tyhi - пустой массив
        $productsInCart=array();
        if(isset($_SESSION['products'])){
            $productsInCart = $_SESSION['products'];
        }
        if(isset($productsInCart[$id])){
            $productsInCart[$id]++;
        }else{
            $productsInCart[$id]=1;
        }
        $_SESSION['products']=$productsInCart;
        }
    
    //---------product count
    public static function countItems() {
        $count = 0;
        if (isset($_SESSION['products'])){ 
            
            foreach ($_SESSION['products'] as $id => $quantity) {
                $count+=$quantity;
            }
        }
        echo $count;
    }
    
    //------total price
    public static function getTotalPrice($products) {
        $total = 0;
        if($_SESSION['products']){
            $productInCart = $_SESSION['products'];
            foreach($products as $row) {
                $total+=$row['price']*$productInCart[$row['idProduct']];
            }
        }
        return $total;
    }
    
    public static function clearCart() {
        if(isset($_SESSION['products'])) {
            unset($_SESSION['products']);
        }
    }
} // class CartModel
