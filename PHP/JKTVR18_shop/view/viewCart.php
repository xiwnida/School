<?php
ob_start();
?>

<?php
if(isset($productsInCart)){
    ?>
<section id="cart_items">
    <div class="container">
	<h2 class="title text-center">Products in cart</h2>
	<div class="table-responsive cart_info">
    <table class="table table-condensed">
        <thead>
            <tr class="cart_menu">
                <td class="image">Item</td>
                <td class="description"></td>
                <td class="price">Price</td>
                <td class="quantity">Quantity</td>
                <td class="total">Total</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($products as $product){
                
            ?>
            
        <tr>
            <td class="cart_product">
                    <a href="detail?id=<?php echo $product['idProduct']; ?>">
                        <img src="images/<?php echo $product['picture']; ?>" width="100px" alt=""></a>
            </td>
            <td class="cart_description">
                    <h4><a href="detail?id=<?php echo $product['idProduct']; ?>"><?php echo $product['nameProduct']; ?></a></h4>
                    <p> ID: <?php echo $product['idProduct']; ?></p>
            </td>
            <td class="cart_price">
                    <p><?php echo $product['price']; ?>&euro;</p>
            </td>
            <td class="cart_quantity">
                    <div class="cart_quantity_button">

                        <p><?php echo $productsInCart[$product['idProduct']]; ?></p>

                    </div>
            </td>
            <td class="cart_total">
                    <p class="cart_total_price"><?php echo $productsInCart[$product['idProduct']]*$product['price']; ?>&euro;</p>
            </td>
            <td class="cart_delete">
                    <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
            </td>
    </tr>
    <?php
}
    ?>
    
    
    <tr>
            <td colspan="5" align="right" ><h4>Общая стоимость, euro €:</h4></td>
            <td class="cart_total_price"><?php echo $totalPrice ?></td>
    </tr>
    <tr>
            <td colspan="5" align="right"><h4>Очистить корзину: </h4></td>
            <td class="cart_delete">
            <a href="cartClear" class="cart_clear"><i class="fa fa-times"></i></a>
                    </td>
    </tr>
                </tbody>
        </table>
        <div style="text-align:right; margin-right:50px;">
        <a class="btn btn-default cart checkout" href="
        "><i class="fa fa-shopping-cart"></i> Оформить заказ</a>
        </div>
			</div>


    <?php
}else{
    //cart empty
    ?>
<h4>Ваша корзина пуста</h4>
<a href="./">Вернуться к покупкам</a>
    <?php
   
}
?>
</div>
</div>
</section>
<?php
$content = ob_get_clean();
include_once 'view/templates/layoutForm.php';