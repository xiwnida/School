<?php

/**
 * Description of controllerBeasts
 *
 * @author 
 */
class controllerBeasts {
    //put your code here
    
    public static function startSite(){
        include_once 'view/main.php';
    }
    //-------------------error404
    public static function error404(){
        include_once 'view/error404.php';
    }
    //-----books list
    public static function BeastList(){
        
        $BeastList= modelBeasts::getBeastsList();
        $ClassList = modelClass::getClassList();
        $beastClass = '';
        include 'view/BeastList.php';
    }
    //----------------------detail Book
    public static function detailBeast($title){
        //получить инфо об одной книге
        //$test - либо инфо либо false - инфо не найдено
        $test= modelBeasts::getBeastOne($title);
        //.............more
        if($test[0]=true){
            $Beast=$test[1];//найденная книга - запись из массива
            include_once 'view/BeastOne.php';
        }else{
            include_once 'view/error404.php';
        }
    }
    
    
    
}//end class!!!
