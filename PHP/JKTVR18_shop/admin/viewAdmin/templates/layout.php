<html>
<?php
//проверка входа
if(!isset($_SESSION['userId']) || $_SESSION['status']!=1){
    header('Location:./');//Login form - folder admin/
}
?>
<head>
	<title>Dashboard</title>
	<link href="../public/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">     
<!-- -->
	<div class="header clearfix">
		<nav class="navbar navbar-default">
		<div class="container-fluid">
	  <?php 
	  echo '<ul class="nav nav-pills pull-right">';
	  	  
	  //приветствие админа
	  echo '<li>';	  
	  echo ' <a href="logout">'.$_SESSION['nameUser'].' Logout <i class="fa fa-sign-out"></i></a>';
	  echo '</li>'; 
	  echo '</ul>';
	  
          
          //-----menu admin
	  echo '<h4><a href="../" target=_blank>WEB SITE</a> ';
	  
	  // для админа условие -----------productAction -------- meny
            if(isset($_SESSION['status']) && $_SESSION['status'] == 1){
                echo '<a href = "productAction">ProductAction</a>';
            }
		echo '</h4>';
		
	 
	  ?>
	</div>
	</nav>
	</div>
	  <div class="col-md-12 text-center">
					<h2 class="templatemo_logo"><?php if(isset($title)) echo $title;  ?></h2> <!-- /.logo -->
				</div> <!-- /.col-md-12 -->
	<div id="content" style="padding-top:20px; min-height:400px;">
	
		<?php 
			if(isset($content)) echo $content; 
		?>
	
	</div>
      <footer class="footer">
        <p>&copy; 2019  Design Admin panel</p>
      </footer>

    </div> <!-- /container -->
</body>
</html>