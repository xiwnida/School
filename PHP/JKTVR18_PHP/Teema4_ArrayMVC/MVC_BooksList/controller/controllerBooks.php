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
class controllerBooks {
    
    //------------main
    public static function startSite(){
        
        include_once 'view/main.php';
    }
    //------------error404
    public static function error404(){
        
        include_once 'view/error404.php';
        
    }
    //------------book list
    public static function booksList(){
        
        $booksList = modelBooks::getBooksList();
        include_once 'view/booksList.php';
    }
    
}//end class!!!

