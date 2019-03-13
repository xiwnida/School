<?php

ob_start();
?>
<div>
    <h3 style="margin: 10px 10px 10px 50px;">Департаменты министерства магии</h3>
    
    <img src="public/img/MOM.jpg" alt="" style="width: 500px;"/>
</div>
<div style="clear:both;"></div>
<hr>
<?php

foreach ($DeptList as $Dept){
    echo '<div style="float:left; width:100px; height:100px; margin:10px; " >' ;
    $path='public/img/';
    if(file_exists($path.$Dept['image']) && $Dept['image']!=''){
    echo '<img src="'.$path.$Dept['image'].'" style="height: 55px;"  title="'.$Dept['deptname'].'">';
              
  
}//if
else{
    echo '<p style="width:100px; height:40px;">
    No photo</p>';
    
}

    echo '</div>';
    
}//foreach



?>
<div style="clear:both;"></div>



<?php
$content = ob_get_clean();
include_once 'view/templates/layout.php';
