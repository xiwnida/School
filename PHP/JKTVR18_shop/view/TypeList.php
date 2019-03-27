<?php
ob_start();
foreach ($typeList as $type){
    
    echo '<div class="panel panel-default">
    <div class="panel-heading">
    <h4 class="panel-title">
    <a href="type?id='.$type['idType'].'">'.$type['nameType'].'</a></h4>
    </div>
    </div>';
} // foreach

$TypeMenu = ob_get_clean();