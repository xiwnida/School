<?php

ob_start();
?>

<div class="col-sm-4 ">
    <div class="login-form">
        <h4>Confirm payment</h4>
        <form action="cartPayment" method ="post">
            Подтвердите оплату
            <input type="checkbox" name="check" required />				
        <button type="submit" name="payment" class="btn btn-default">Подтвердить</button>
        </form>
    </div>
    <br>	
</div>
<div style="clear:both;"></div>
    <p><a class="btn btn-default checkout" href="cart">
    <i class="fa fa-shopping-cart"></i>
    Управление корзиной
    </a></p>	
	

<?php
$content = ob_get_clean();
include_once 'view/templates/layoutForm.php';

