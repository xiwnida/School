<?php

class CartController {
    // --- cart add
    public static function actionAdd($id){
        CartModel::addproduct($id);
        return;
    }
    
    //---------cart view
    public static function cartView() {
        if(isset($_SESSION['products'])) {
            $productsInCart=$_SESSION['products'];
            //array ([5] => 2 [2] => 1)
            //Result array [0] =>5, [1] =>2 5,2 - id
            $productIds = array_keys($productsInCart);
            //--Товары из корзины
            $products = ProductModel::getProductsByIds($productIds);
            //-------Totalprice!!!
            $totalPrice = CartModel::getTotalPrice($products);
            
           
        }
        include_once 'view/viewCart.php';
    }
    
    public static function actionCartClear() {
        CartModel::clearCart();
        return;
    }
}
