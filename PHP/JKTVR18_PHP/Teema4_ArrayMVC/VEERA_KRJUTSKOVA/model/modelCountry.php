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
class modelCountry {
    //put your code here
    
    
      //books list
    public static function getCountryList(){
        include_once 'model/countriesArray.php';
        return $countries; //имя массива из файла
    }//public
    
    public static function getCountryOne($title){
        $allCountries = modelCountry::getCountryList(); //массив с книгами
        //перебрать массив и найти одну запись о title
        $i = 0;
        $test = array(false);
        foreach ($allCountries as $oneCountry){
            if($oneCountry['name']==$title){
                $test=array(true,$allCountries[$i]);
                return $test;
            }else{
                $i++;
            }//if
            
        }//foreach
        return $test;
    }//public
    
}//class
