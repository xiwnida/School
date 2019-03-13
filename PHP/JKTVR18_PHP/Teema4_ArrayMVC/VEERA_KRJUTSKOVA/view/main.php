<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

ob_start();
?>
<div style="text-align: center;"><a href="Country">Узнать о странах</a> <label>или</label> <a href="News">узнать о новостях</a>	</div>

<?php
$content = ob_get_clean();
include_once 'view/templates/layout.php';