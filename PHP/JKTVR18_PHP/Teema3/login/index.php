<?php
session_start();
?>
<html>
<head>
    <title>Форма входа</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="style.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<body>
<div class = "container">
	<div class="wrapper">
		<form action="mySite.php" method="post" name="Login_Form" class="form-signin">       
		    <h3 class="form-signin-heading">Welcome Back! Please Sign In</h3>
			  <hr class="colorgraph"><br>
			  <input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" />
			  <input type="password" class="form-control" name="password" placeholder="Password" required=""/>     		  
			 
			  <button class="btn btn-lg btn-primary btn-block"  name="send" value="Login" type="Submit">Login</button>  
                          
                          <?php
                          if(isset($_SESSION['error'])){
                              echo '<br>'.$_SESSION['error'];
                              unset($_SESSION['error']);
                          }
                          ?>
                          
		</form>			
	</div>
</div>
</body>
</html>