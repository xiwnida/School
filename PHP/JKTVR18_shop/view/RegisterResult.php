<?php

ob_start();
?>
<?php

echo'<section id="form">
    <div class="container">
    <div class="row">';
if (isset($result)) {
    if ($result[0] == true) {
        echo'<p>User ' . $_SESSION['nameUser'] . ' registered successfully.</p>';
        if(isset($_SESSION['products'])){
            //----управление корзиной
            echo '<div style="clear:both;"></div>
    <p><a class="btn btn-default checkout" href="cart">
    <i class="fa fa-shopping-cart"></i>
    Управление корзиной
    </a></p>	';
        }
    }
    if ($result[0] == false) {
        echo '<p>Registration error<br>' . $result[1] . '</p>';
    }
}
echo '</div>
    </div>
    </section>';
?>
<?php

$content = ob_get_clean();
include_once 'view/templates/layoutForm.php';
