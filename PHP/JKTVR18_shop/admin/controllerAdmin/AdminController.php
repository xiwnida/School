<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of adminController
 *
 * @author pupil
 */
class adminController {
    public static function formLogin(){
        if(isset($_SESSION['userId'])){
            include_once 'viewAdmin/startAdmin.php';
        }else{
            include_once 'viewAdmin/formLogin.php';
        }
    }
    
    //admin autorisation 
    public static function loginResult(){
        $result = MainModel::setLoginResult();
        if(isset($result) && $result[0]==true){
            include_once 'viewAdmin/startAdmin.php';
        }else{
            include_once 'viewAdmin/formLogin.php';
        }
    }
    
    public static function logoutResult(){
        $result = MainModel::Logout();
        //include_once 'viewAdmin/formLogin.php';
        header('Location:./');
    }
}//class
