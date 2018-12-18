<h2>Example Array</h2>
<?php
echo '<h3>LineaArray</h3>';
$text='';
$countries=array('Estonia','Russia','England','France');
for ($i=0;$i<count($countries);$i++){
    $text.='<li>'.$countries[$i].'</li>';
}
echo '<ul>'.$text.'</ul>';
echo '<br>Countries total:'.count($countries);

//-----------
echo '<h3>Ассоциативный массив</h3>';
$newCountries=array(
    'Estonia'=>'Tallin',
    'Russia'=>'Moscow',
    'England'=>'London',
    'France'=>'Paris'
);
$t2='';
foreach ($newCountries as $country=>$capital){
    $t2.='<p>'.$country.' - '.$capital.'</p>';
}
echo '<hr>';
echo $t2;

echo '<hr>';
echo '<h3>Ассоциативный массив. Двумерный массив</h3>';


$myCountries=array(
    array(
        'name'=>'Estonia',
        'capital'=>'Tallinn',
        'cities'=>array('Kohtla-Jarve','Johvi','Narva')
    ),
    array(
        'name'=>'Russia',
        'capital'=>'Moscow',
        'cities'=>array('S-Peterburg','Sochi','Kaluga')
    ),
    array(
        'name'=>'England',
        'capital'=>'London',
        'cities'=>array('Manchester','Chester','Ocsvword')
    )
);
foreach($myCountries as $rik){
    //print_r($rik);
    //echo '<br>';
    echo '<h4>'.$rik['name'].'</h4>';
    echo '<p>Capital: '.$rik['capital'].'</p>';
    echo '<ol>';
    
    foreach($rik['cities'] as $city){
        echo '<li>'.$city.'</li>';
    }
    echo '</ol>';
    echo '<br>Cities totel: '.count($rik['cities']);
}
