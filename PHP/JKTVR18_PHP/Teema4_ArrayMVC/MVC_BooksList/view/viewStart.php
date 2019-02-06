<?php

ob_start();
?>
<div>
    <h3>World countries</h3>
    <img src="public/images_country/world.png" alt="" style="width:300px"/>
</div>
<div style="clear:both"></div>
<hr>
<?php
    foreach ($stateList as $country){
        echo '<div style="float:left; width:100px; height:100px;">';
        
        $path = 'public/images_country/';
        if(file_exists($path.$country['image']) && $country['image']!= ''){
            echo '<img src="'.$path.$country['image'].'">';
        }else{
            echo '<p style="width:100px; height:50px;">No photo</p>';
        }//if
        echo '<h5>'.$country['image'].'</h5>';
        echo '</div>';
    }//foreach






$content = ob_get_clean();
include_once 'view/templates/layout.php';