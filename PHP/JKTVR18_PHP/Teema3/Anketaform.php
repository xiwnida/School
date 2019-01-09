<?php

/*
 * HTML форма: input text, select,
 * Arrays
 * Form fill and answer after reg
 * Functions and dates
 */
$spec=array(
    array('name'=>'IT', 'location'=>'Johvi', 'photo'=>'1.jpg'),   
    array('name'=>'Повар', 'location'=>'Narva', 'photo'=>'2.jpg'),  
    array('name'=>'Повар', 'location'=>'Johvi', 'photo'=>'4.png'),  
    array('name'=>'слесарь', 'location'=>'Kohtla-Jarve', 'photo'=>'3.jpg'),  
    array('name'=>'Продавец', 'location'=>'Aseri', 'photo'=>''),  
    array('name'=>'No job', 'location'=>'', 'photo'=>'user.png'),  
)
?>
<h2>Анкета</h2>
<form method='POST' action=''>
    <div>>
        <label>Ваше имя</label>
        <input type="text" name="firstname" placeholder="Enter your name" autofocus="" required="">
    </div>
    <div>>
        <label>Год рождения</label>
        <input type="number" name="year" placeholder="Enter your age" required="" min="1950" max="2019" value="1950">
    </div>
    <div>
        <label>Профессия</label>
        <select name="job">
            <?php
            foreach ($spec as $sp){
                echo '<option value="'.$sp['name'].'-'.$sp['location'].'-'.$sp['photo'].'">';
                echo trim($sp['name'].'-'.$sp['location'],'-');
                echo '</option>';
            }
            
            ?> 
        </select>
    </div>
    <div>
        <input type="submit" name="send" value="SEND">
    </div>
</form>
<hr>
<?php
if (isset($_POST['send'])){
$firstname=$_POST['firstname'];
$year=$_POST['year'];
$job=$_POST['job'];
$error='';
if(strlen(trim($firstname))==0){
    $error.='<br>Имя введено неверно';
}
if($error==""){
    //ошибок нет
    $age=date('Y')-$year;
    //job photo
    $str=explode('-',$job);
    //$str[0]-name
    //$str[1]-city
    //$str[2]-photo
    if(file_exists("images/".$str[2]) && $str[2]!=""){
        $photo='<img src="images/'.$str[2].'">';
    }else{
        $photo='No photo';
    }
    //--------
    $text='';
    $text.='<h2>Привет, '.$firstname.'</h2>';
    $text.='Возраст: '.$age.'<br>';
    $text.='Специальность: '.$str[0].'<br>';
    $text.='Город: '.$str[1].'<br>';
    $text.=$photo;
    
    echo $text;
    
}else{
    echo $error;
}
}
?>