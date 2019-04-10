<?php ob_start(); 
$title = "Product List"
?>
<div>
    <a href="addProduct" role="button" class="btn btn-primary">Add product</a>
</div>

<table class="tabel table-bordered table-responsive" width="100%">
    <tr>
        <th>ID</th>
        <th>Product Name</th>
        <th>Price</th>
        <th></th>
    </tr>
    <?php
    foreach($products as $product){
        echo '<tr>';
        echo '<td>'.$product['idProduct'].'</td>';
        echo '<td>'.$product['nameProduct'];
        echo '<h5>Category: '.$product['nameCategory'].'</h5>';
        echo '<h5>Type: '.$product['nameType'].'</h5>';
        echo '</td>';
        echo '<td>'.$product['price'].'</td>';
        
        
        
        echo '<td>';
        //buttons
        echo '<a href="editProduct?id='.$product['idProduct'].'" role="button" class="btn btn-primary">Edit</a> ';
        echo '<a href="delProduct?id='.$product['idProduct'].'" role="button" class="btn btn-primary">Delete</a> ';
        
        echo '</td>';
        
        echo '</tr>';
    }
    
    ?>
</table>

<?php $content = ob_get_clean(); ?>

<?php include "viewAdmin/templates/layout.php";