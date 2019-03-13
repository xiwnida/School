<?php

ob_start();
    echo '<h2>Список классов магических существ. </h2>';
    
foreach ($ClassList as $Class){
    echo '<h3>';
    echo '<a href="show?class='.$Class['class'].'">'.$Class['text'].'</a>';
    echo '</h3>';
}


$menu = ob_get_clean();