<?php

ob_start();

//print_r ($categoryList);
foreach($categoryList as $category) {
    echo '<div class="panel panel-default">
	<div class="panel-heading">
            <h4 class="panel-title"><a href="category?id='.$category['idCategory'].'">'.$category['nameCategory'].'</a></h4>
	</div>
    </div>';
}
$categoryMenu = ob_get_clean();
