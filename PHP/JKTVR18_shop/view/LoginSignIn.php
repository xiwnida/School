<?php

ob_start();
?>
<?php

echo'<section id="form">
    <div class="container">
    <div class="row">
    <div class="col-sm-4 col-sm-offset-1">
    <div class="login-form"><!--login form-->
    <h2>Login to your account</h2>
    <form action="LoginResult" method="POST">
    <input type="email" name="email" placeholder="Email Address" required/>
    <input type="password" name="password" placeholder="Password" required/>
    <button type="submit" class="btn btn-default" name="login">Login</button>
    </form>
    </div><!--/login form-->
    </div>
    <div class="col-sm-1">
    <h2 class="or">OR</h2>
    </div>
    <div class="col-sm-4">
    <div class="signup-form"><!--sign up form-->
    <h2>New User Signup!</h2>
    <form action="registerResult" method="POST">
    <input type="text" name="username" placeholder="Name" required/>
    <input type="email" name="email" placeholder="Email Address" required/>
    <input type="text" name="address" placeholder="Shiping address" required/>
    <input type="password" name="password" placeholder="Password" required/>
    <input type="password" name="confirm" placeholder="Confirm password" required/>
    <button type="submit" class="btn btn-default" name="signup">Signup</button>
    </form>
    </div><!--/sign up form-->
    </div>
    </div>
    </div>
    </section>';
?>
<?php

$content = ob_get_clean();
include_once 'view/templates/layoutForm.php';
