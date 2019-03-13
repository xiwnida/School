<?php

class modelBeasts {
    
  //beasts list
  public static function getBeastsList(){
      include_once 'model/BeastArray.php';
      return $Beasts;// имя массива из файла
  }
    //beast info
    public static function getBeastOne($title) {
        $allBeasts = modelBeasts::getBeastsList(); //массив с существами
        //перебрать массив и найти одну запись по title
        $i = 0;
        $test = array(false);
        foreach ($allBeasts as $oneBeast) {
            if ($oneBeast['name'] == $title) {

                $test = array(true, $allBeasts[$i]);
                return $test; //найдена книга
            }//if
            $i++;
        }//foreach
        return $test; //false - ничего не найдено!
   
        }//function
        
        
        
        
}//class