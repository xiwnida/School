<?php

ob_start();
if (count($productList)>0){
echo '<center><p>Всего товаров: '.count($productList).'</p></center>';
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
}
}else{
    echo '<center><p>Асортимент отсутствует</p></center>';
}

$content = ob_get_clean();
include_once 'view/templates/layout.php';