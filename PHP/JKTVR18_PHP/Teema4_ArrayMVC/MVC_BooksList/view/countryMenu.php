<?php
//перебрать массив statelist
//вытащить названия и построить меню по названиям государств

ob_start();

foreach ($stateList as $country){
    echo '<h4>';
    echo '<a href="Country?name='.$country['country_name'].'">'.$country['country_name'].'</a>';
    echo '</h4>';
}


$menyu = ob_get_clean();