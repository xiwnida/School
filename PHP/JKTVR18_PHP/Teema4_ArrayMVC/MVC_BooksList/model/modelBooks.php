<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of modelBooks
 *
 * @author pupil
 */
class modelBooks {
    //put your code here
    
    
      //books list
    public static function getBooksList(){
        include_once 'model/booksArray.php';
        return $books; //имя массива из файла
    }//public
    
    public static function getBookOne($title){
        $allBooks = modelBooks::getBooksList(); //массив с книгами
        //перебрать массив и найти одну запись о title
        $i = 0;
        $test = array(false);
        foreach ($allBooks as $oneBook){
            if($oneBook['bookname']==$title){
                $test=array(true,$allBooks[$i]);
                return $test;
            }else{
                $i++;
            }//if
            
        }//foreach
        return $test;
    }//public
    
}//class
