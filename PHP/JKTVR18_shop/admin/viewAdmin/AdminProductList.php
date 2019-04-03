<?php ob_start(); 
$title = "Product List"
?>
<div>
    <a href="addProduct" role="button" class="btn btn-primary">Add product</a>
</div>



<?php $content = ob_get_clean(); ?>

<?php include "viewAdmin/templates/layout.php";