<h2>My school - students list</h2>
<?php


include_once 'schoolArray.php';
foreach ($students as $student){
    echo '<div style="float:left; width:200px; margin:5px">';
    echo '<h3>'.$student['name'].'</h3>';
    if(file_exists('images/'.$student['photo'])){
    echo '<img src="images/'.$student['photo'].'" style="width:120px; height:150px;" >';
    }else{
        echo '<p>No Photo</p>';
    }
    echo '<p>Телефон: '.$student['mobil'].'</p>';
    echo '<h4>Mail: </h4>';
    echo '<p>Kool: '.$student['email']['kool'].'</p>';
    echo '<p>Isik: '.$student['email']['isik'].'</p>';
    
    echo'<h4>Адрес: </h4>';
    foreach ($student['aadress'] as $key=>$value){
        echo $key.': '.$value.'<br>';
    }
    
    echo '</div>';
}//students


//------------------------------
echo '<div style="clear:both; padding-top:20px;"></div>';
echo '<h2>Всего студентов: '.count($students).'</h2>';