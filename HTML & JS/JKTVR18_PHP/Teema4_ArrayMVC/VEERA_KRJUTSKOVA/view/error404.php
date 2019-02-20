<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

ob_start();
?>
<h2>404 ошибка</h2>
<article>
    <p>
        Страница по вашему запросу не существует.
    </p>
    <img src="http://odnoklassnikihelp.com/wp-content/uploads/2012/05/oshibka-404-v-odnoklassnikax1.jpg">


<?php
$content = ob_get_clean();
include_once 'view/templates/layout.php';