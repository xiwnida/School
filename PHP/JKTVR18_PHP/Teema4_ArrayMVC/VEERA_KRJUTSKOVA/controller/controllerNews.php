<?php

class controllerNews {
    //строим меню - отдельная функция
    public static function menu(){
        $acategoryList = modelNews::getCatList();
        //...........more
        include_once 'view/newsMenu.php';
        //........more
        return $menu;
    }




    public static function startSite(){
        //построить left меню - список государств и ссылки
        //right div - вывести флаги и государства
        $menu = controllerNews::menu();
        //2
        $acategoryList = modelNews::getCatList();
        
        include_once 'view/viewStart.php';
    }//startSite
    
    public static function news($name){
        $menu = controllerNews::menu();
        //-----right content
        $oneNews = modelNews::getNews($name);
        include_once 'view/viewNews.php';
    }
}//class
