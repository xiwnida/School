<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of controllerBooks
 *
 * @author pupil
 */
class controllerCountry {
    
    //------------main
    public static function startSite(){
        
        include_once 'view/main.php';
    }
    //------------error404
    public static function error404(){
        
        include_once 'view/error404.php';
        
    }
    //------------book list
    public static function countrysList(){
        
        $countriesList = modelCountry::getCountryList();
        include_once 'view/countriesList.php';
    }
    
    public static function detailCountry($title){
        //получить информацию об одной книге
        //$test - либо найдет информацию, либо не найдет
        $test = modelCountry::getCountryOne($title);
        //.......more
        if($test[0]==true){
            $country = $test[1];//найденая книга
            include_once 'view/countryOne.php';
        }else{
            include_once 'view/error404.php';
        }
    }
    
}//end class!!!


