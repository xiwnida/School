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
class modelCountry {
    
    public static function getCountryList(){
        //массив государств
        include 'model/countries.php';
        return $countries;
    }
    public static function getCountry($name){
        $allCountrues = modelCountry::getCountryList();
        foreach ($allCountrues as $countryOne){
            if ($countryOne['country_name'] == $name){
                return $countryOne;
            }//if
        }//foreach
    }//getCountry
}
