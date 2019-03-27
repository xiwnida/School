<?php

ob_start();

?>
<?php
if(count($productList)>0){
foreach ($productList as $product) {
echo '<div class="col-sm-4">
    <div class="product-image-wrapper">
        <div class="single-products">
            <div class="productinfo text-center">
                <img src="images/'.$product['picture'].'" alt="" />
                <h2>'.$product['price'].'</h2>
                <p>'.$product['nameProduct'].'</p>
                <a href="detail?id='.$product['idProduct'].'" class="btn btn-default cart"><i class="fa fa-expand"></i> Detail</a>
            </div>
        </div>
    </div>
</div>';
}// foreach
echo '<div style="clear:both"></div>';
echo '<p>Всего товаров по категории: '.count($productList).'</p>';
} // if
else{
    echo '<p>No products by category</p>';
}
?>

<?php
$content = ob_get_clean();
include_once 'view/templates/layout.php';