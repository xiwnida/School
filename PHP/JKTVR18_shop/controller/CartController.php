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
            
        if(count($products) == 0){
            unset($_SESSION['products']);
            unset($productsInCart);
        }
        }
        
        include_once 'view/viewCart.php';
    }
    
    public static function actionCartClear() {
        CartModel::clearCart();
        return;
    }
    
    public static function actionDelete($id) {
        CartModel::deleteProduct($id);
        return;
    }
    
    public static function payment() {
        include_once 'view/confirmPayment.php';
    }
    //------check confirm order
    public static function actionCheckout() {
        $result = CartModel::getPayment();
        include_once 'view/confirmOrder.php';
    }
}
