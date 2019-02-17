<h1 style="margin: 30px 0px 30px 0px; text-align: center;">Мои любимые мультфильмы</h1>
<hr style="margin-bottom: 40px;">
<link href="style.css" rel="stylesheet" type="text/css"/>
<?php

include_once 'filmsArray.php';
foreach ($films as $film){
  
  echo '<div   style="width:45%; display: inline-block; margin:10px 10px 10px 10px; vertical-align: top;">';
  
  echo '<div style="overflow:hidden;";>';
    if(file_exists($film['picture'])){
        echo '<img src="'.$film['picture'].'" style="width:250px; height:350px; float:left; margin: 20px 20px 10px 0px; border:1px solid;" >';
     }else{
        echo '<p>No Photo</p>';
    };
    echo '<h2 style="text-align:center;">'.$film['name'].'</h2>';  
    echo '<p><strong>Аннотация:</strong> '.$film['description'].'</p>'; 
  echo '</div>';
  
  echo '<div style=" text-align:center; vertical-align:top; border:1px solid; background-color:lightyellow;">';
  
  echo '<div style="display: inline-block; vertical-align: middle;  padding:20px;">';
    echo '<p ><strong>Год выхода:</strong> '.$film['year'].'</p>'; 
    echo '<p><strong>Страна:</strong> '.$film['country'].'</p>';
  echo '</div>';
    
  echo '<div style="display: inline-block; vertical-align: middle;  padding:20px; ">';
    echo'<h4>Режиссеры:</h4><ul>';
    foreach ($film['rez'] as $key=>$value){
            echo '<li>'.$value.'</li>';
    };
    echo '</ul>';
  echo '</div>';
  
  echo '<div style="padding:20px; ">';
    echo'<h4>Актеры:</h4>';
    echo '<div>';
        foreach ($film['actors'] as $key=>$actor){
            echo '<div style="display: inline-block; vertical-align: middle;  padding:20px; ">';
            echo '<img src ="'.$actor['photo'].'" style="width:100px; height:150px;"><p>'.$actor['name'].'</p>';
            echo '</div>';
        };
        echo '</div>';
    echo '</div>';
    echo '</div>';
  echo '</div>';
};