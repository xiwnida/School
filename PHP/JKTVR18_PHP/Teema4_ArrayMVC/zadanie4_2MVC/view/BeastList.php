<?php

ob_start();

?>

<h2>Список магических существ </h2>

<?php
if (isset($beastClassText)){
    echo '<h3>'.$beastClassText.'</h3>';
}
//$BeastList - массив из контроллера

foreach ($BeastList as $Beast){
    if ($beastClass == '' || $beastClass == $Beast['classname']){
    
        echo '<article>';

        echo '<h3>'.$Beast['name'].'</h3>';
        echo '<img src="public/img/'.$Beast['image'].'">';

        echo '<h4>'.$Beast['classname'].'</h4>';

        echo '<h4><a href="detail?title='.$Beast['name'].'">Подробнее</a></h4>';

        echo '</article>';
    }//if
}//foreach
$Beast['name']="";
?>
<?php
$content= ob_get_clean();

ob_start();

echo '<div style="float:right">';
foreach ($ClassList as $Class){
    
    echo '<a href="detail?getClass='.$Class['class'].'">'.$Class['class'].'</a><br>';
}
 echo '</div>';
 
 $contentClasses = ob_get_clean();
 
 
include_once 'view/templates/layout.php';