<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MainController
 *
 * @author Reshetnikov
 */
class MainController {

    // --- формы Login и SignIn

    public static function LoginSignIn() {
        include_once 'view/LoginSignIn.php';
    }

    public static function registerResult() {
        $result = MainModel::setRegisterResult();
        // --- result: true or false
        include_once 'view/registerResult.php';
    }

    public static function logoutAction() {
        $result = MainModel::Logout();
        header('location:./');
    }
    
    // --- login
    
    public static function loginResult() {
        $result = MainModel::setLoginResult();
        include_once 'view/LoginResult.php';
    }
}//class MainController