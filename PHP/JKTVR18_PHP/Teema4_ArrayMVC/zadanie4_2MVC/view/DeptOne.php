<?php

ob_start();
?>
<div>
    <h3>Country: <?php echo $deptname; ?></h3>
    
   
</div>
<div style="clear:both;"></div>
<hr>
<?php


    echo '<div style=" width:400px;">' ;
    $path='public/img/';
    if(file_exists($path.$Dept['image']) && $Dept['image']!=''){
    echo '<img src="'.$path.$Dept['image'].'" style="padding-right: 0; width: 300px; border: 1px solid gray;">';
              
  
}//if
else{
    echo '<p style="width:100px; height:40px;">
    No photo</p>';
    
}
echo '<div style="clear:both;"></div>';    
echo '<h5>'.$Dept['deptname'].'</h5>';
echo '<h5>'.$Dept['text'].'</h5>';
   
   

?>
<div style="clear:both;"></div>



<?php
$content = ob_get_clean();
include_once 'view/templates/layout.php';

