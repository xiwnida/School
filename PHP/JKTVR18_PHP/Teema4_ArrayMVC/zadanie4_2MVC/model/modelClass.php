<?php

class modelClass {
    //put your code here

public static function getClassList(){
      include 'model/ClassArray.php';
      return $Classes;// имя массива из файла
  }
  //beast info
    public static function getClassOne($getClass) {
        $allClasses = modelClass::getClassList(); //массив с существами
        //перебрать массив и найти одну запись по title
        foreach ($allClasses as $oneClass) {
            if ($oneClass['class'] == $getClass) {

                //$test = array(true, $allClasses[$i]);
                return array($oneClass['class'], $oneClass['text']); //найдена книга
            }//if
            //$i++;
        }//foreach
        //return $test; //false - ничего не найдено!
   
        }//function
        
        
        
        
}//class