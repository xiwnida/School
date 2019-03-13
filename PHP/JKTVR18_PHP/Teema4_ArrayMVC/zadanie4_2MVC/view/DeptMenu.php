<?php

/* 
 перебрать массив $DeptList
 * вытащить название и построить меню по названиям гос-в
 */

ob_start();

foreach ($DeptList as $Dept){
    
    echo '<h4>';
    echo '<a href="Dept?name='.$Dept['deptname'].'">';
    echo $Dept['deptname'].'</a>';
    echo '</h4>';
    
}


$menu= ob_get_clean();
