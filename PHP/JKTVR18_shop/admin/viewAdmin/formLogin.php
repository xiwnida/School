<!DOCTYPE>
<html>
<head>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head
<body>
    
    <div class="container" style="margin-top: 2%;">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please sign in</h3>
                </div>
                <div class="panel-body">
                    <form accept-charset="UTF-8" role="form" method="POST" action="loginResult">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="text">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>
                            <input class="btn btn-lg btn-success btn-block" type="submit" name="login" value="Login">
                        </fieldset>  
                    </form>
                </div>      
            </div>
            <p>
            <?php
                //error email or password
            if(isset($result) && $result[0]==false){
                echo $result[1];
            }
            
            ?>
            </p>
            <center><a href="../">Go Back</a></center>
        </div>
    </div>
</div>

</body>
    
</html>