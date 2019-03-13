<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of modelCountry
 *
 * @author pupil
 */
class modelNews {
    
    public static function getCatList(){
        //массив государств
        include 'model/catArray.php';
        return $categories;
    }
    
    public static function getNewsList(){
        //массив государств
        include 'model/newsArray.php';
        return $newsArray;
    }
    
    public static function getNews($name){
        $allNews = modelNews::getNewsList();
        foreach ($allNews as $oneNews){
            if ($oneNews['name'] == $name){
                return $oneNews;
            }//if
        }//foreach
    }//getCountry
}
