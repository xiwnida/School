<?php

class controllerCountry {
    //строим меню - отдельная функция
    public static function menu(){
        $stateList = modelCountry::getCountryList();
        //...........more
        include_once 'view/countryMenu.php';
        //........more
        return $menyu;
    }




    public static function startSite(){
        //построить left меню - список государств и ссылки
        //right div - вывести флаги и государства
        $menyu = controllerCountry::menu();
        //2
        $stateList = modelCountry::getCountryList();
        
        include_once 'view/viewStart.php';
    }//startSite
    
    public static function country($name){
        $menyu = controllerCountry::menu();
        //-----right content
        $country = modelCountry::getCountry($name);
        include_once 'view/viewCountry.php';
    }
}//class
