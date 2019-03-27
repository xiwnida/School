<?php

ob_start();

?>
<?php
echo'<div class="col-sm-9 padding-right">
    <div class="features_items"><!--features_items-->
    <div class="product-details"><!--product-details-->
    <div class="col-sm-5">
    <div class="view-product">
    <img src="images/'.$product['picture'].'" alt="" />
    </div>
    </div>
    <div class="col-sm-7">
    <div class="product-information"><!--/product-information-->
    <h2>'.$product['nameProduct'].'</h2>
    <p>Web ID: '.$product['idProduct'].'</p>
    <span>
    <span>'.$product['price'].'</span>
    <a href="cartAdd?id='.$product['idProduct'].'" class="btn btn-fefault cart">
    <i class="fa fa-shopping-cart"></i>
    Add to cart
    </a>
    </span>
    </div><!--/product-information-->
    </div>
    </div>
    </div><!--/product-details-->
    </div>';
?>

<?php
$content = ob_get_clean();
include_once 'view/templates/layout.php';