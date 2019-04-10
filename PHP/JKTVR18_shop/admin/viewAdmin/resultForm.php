<?php 
ob_start();
$title = 'Результат выполнения запроса'; 
 ?>
 
<div class="container" style="min-height:400px;">
<div class="col-md-11">	
 <article>
 <?php 
 if(isset($test) && $test==true){	
?>
	<div class="alert alert-info">
		<strong>Запрос выполнен! </strong><a href="productAction"> Список товаров</a>
	</div>
<?php
}
if(isset($test) && $test==false)
  {
?>
	<div class="alert alert-warning">
		<strong>Ошибка выполнения запроса!</strong> <a href="productAction"> Список товаров</a>
	</div>
<?php
  }	
?>
</article>
	</div>			
</div>
<?php $content = ob_get_clean(); ?>

<?php include "viewAdmin/templates/layout.php"; ?>
