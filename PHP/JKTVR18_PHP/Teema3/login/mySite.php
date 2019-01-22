<?php
/*
 * array clients
 * 1. прочитать данные
 * 2.искать данные в массиве
 *   3. Если данные найдены, то:
 *      Выдать приветствие
 *      Картинку 
 *      Ссылка назад
 *   4. Если не найдены, то перенаправить на index.php
 */
session_start();
$clients=array(
  array(
      'name'=>'admin',
      'pass'=>'123',
      'image'=>'admin.png'
      ),
  array(
      'name'=>'user',
      'pass'=>'456',
      'image'=>'user.png'
      ),
  array(
      'name'=>'pupil',
      'pass'=>'789',
      'image'=>'pupil.png'
      )
);
$return=false;
//---------------------------
if (isset($_POST['send'])){
    //просмотр страницы разрешен
    $username=$_POST['username'];
    $password=$_POST['password'];
    foreach ($clients as $cl){
        if ($cl['name']==$username && $cl['pass']==$password){
            echo '<h2>Здравствуйте '.$cl['name'].'!</h2>';
            echo '<p><img src="images/'.$cl['image'].'" width=100></p>';
            echo '<p><a href="index.php"> Back form login</a></p>';
            $return=true;
            break;
        }//if
    }//foreach
    if ($return==false){
        $_SESSION['error']='Error your name or password';
        header('Location: index.php');
    }//if
}else{
    $_SESSION['error']='Enter your name and password';
    header('Location: index.php');
}