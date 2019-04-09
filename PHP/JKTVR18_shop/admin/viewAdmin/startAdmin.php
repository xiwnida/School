<?php ob_start(); ?>
<article>
  <h3>Админ панель</h3>
  <?php
   //проверка прав админа
   
   if (isset($_SESSION['status']) && $_SESSION['status']==1 )
		{
		echo '<p>Панель управления данными</p>';
		echo '<p>Hello, <b>'.$_SESSION['nameUser'].'!</b></p>';		
		
	   }else{
		   header('Location:../');
	   }
  
?>
</article>

<?php $content = ob_get_clean(); ?>

<?php include "viewAdmin/templates/layout.php";