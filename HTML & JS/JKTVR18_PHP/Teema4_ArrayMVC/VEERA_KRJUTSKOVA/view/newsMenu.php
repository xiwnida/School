<?php
//перебрать массив statelist
//вытащить названия и построить меню по названиям государств

ob_start();
    echo '<h3>Что происходит в...</h3>';
    
foreach ($acategoryList as $category){
    echo '<h4>';
    echo '<a href="read?name='.$category['name'].'">'.$category['country'].'</a>';
    echo '</h4>';
}


$menu = ob_get_clean();