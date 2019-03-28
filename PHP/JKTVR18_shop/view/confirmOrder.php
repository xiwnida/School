<?php 
ob_start(); 
?>
	<div class="col-sm-4 ">
	<?php
	if($result){		
	?>
		<p><a class="btn btn-default checkout" href="./">
		<i class="fa fa-shopping-cart"></i> Заказ оформлен</a></p>	
		<?php
	}else{
		?>
		<p><a class="btn btn-default checkout" href="cart">
		<i class="fa fa-shopping-cart"></i> Заказ НЕ оформлен</a></p>	
	<?php
	}
	?>
		<br>	
	</div>
	<div style="clear:both;"></div>	
	
<?php
 $content = ob_get_clean(); 

include "view/templates/layoutForm.php"; 
 ?>