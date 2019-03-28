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
    
    public static function deleteProduct($id) {
        $productInCart = array();
        if(isset($_SESSION['products'])){
            $productInCart = $_SESSION['products'];
        }
        if(isset($productInCart[$id])){
            $productInCart[$id]--;
            if($productInCart[$id] == 0){
                unset($productInCart[$id]);
            }
        }
        $_SESSION['products'] = $productsInCart;
        return;
    }
    
    public static function getPayment() {
        $result = false;
        if(isset($_POST['payment']) &&isset($_POST['check'])) {
            $productsInCart = array();
            if(isset($_SESSION['products'])){
                $productsInCart = $_SESSION['products'];
            }else{
                return $result;
            }
            //-------list product
            $text = '';
            foreach ($productsInCart as $key=>$quantity) {
                $text.=','.$key.':'.$quantity;
            }
            $text=trim($text,','); //Убирает ненужные символы. Тут - первую запятую
            //-----totalPrice
            $productIds = array_keys($productsInCart);
            $products = ProductModel::getProductsByIds($productIds);
            $totalPrice = CartModel::getTotalPrice($products);//!!!!!!
            /////----------
            $userID = $_SESSION['userId'];
            $date = date('Y-m-d');//!!!!!!!!
            //------запрос, соединение, запись
            $sql = "INSERT INTO `productorder` (`idOrder`, `idUser`, `listProduct`, `date`, `totalSumma`, `status`)
                    VALUES (NULL, '$userID', '$text', '$date', '$totalPrice', '1')";
            $db = new database();
            $answer = $db->executeRun($sql);
            if($answer){
                CartModel::clearCart();
                $result=true;
            }
            }
        
        return $result;
    }
} // class CartModel
