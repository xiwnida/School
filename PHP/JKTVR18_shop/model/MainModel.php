<?php

class MainModel {

    //registerResult
    public static function setRegisterResult() {

        $errorString = "";
        $result = array(false, "Data Error");
        if (isset($_POST['signup'])) {
            $nameUser = $_POST['username'];
            if (trim($nameUser) == "") {
                $errorString . '-<br> Username not entered';
            }
            $address = $_POST['address'];
            if (trim($address) == "") {
                $errorString . '-<br> Shipping address not entered';
            }

            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            if (!$email) {
                $errorString . '-<br> Username not valid';
            }// if(!$email)
            $password = $_POST['password'];
            $confirm = $_POST['confirm'];
            if (!$password || !$confirm || mb_strlen($password) < 6) {
                $errorString . '-<br> Password not entered or too short';
            }
            if ($password != $confirm) {
                $errorString . '-<br> Password and confirm do not match';
            }
            if ($errorString == "") {
                //not error
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                //query in database
                $sql = "INSERT INTO `user` (`idUser`, `nameUser`, `e-mail`, `password`, `address`, `status`, `pass`) VALUES (NULL, '$nameUser', '$email', '$passwordHash', '$address', '0', '$password');";
                $database = new database();
                $item = $database->executeRun($sql);
                if ($item) {
                    // создаём сессии
                    $_SESSION['sessionId'] = session_id();
                    $_SESSION['nameUser'] = $nameUser;
                    $_SESSION['userId'] = $database->getLastId();
                    $_SESSION['status'] = 0;//0-client 1-admin
                    $result = array(true);
                } else {
                    //not register
                    $result = array(false, "User is registered");
                }
            } else {
                $result = array(0, $errorString);
            }
        }//if(isset($_POST['signup']))
        return $result;
    } //public static function setRegisterResult()

    public static function Logout() {
        session_destroy();
        unset($_SESSION['sessionId']);
        unset($_SESSION['nameUser']);
        unset($_SESSION['userId']);
        unset($_SESSION['status']);
        return;
    } // public static function Logout
    
// Login Result

public static function setLoginResult() {
    if(isset($_SESSION['sessionId'])){
        $result=array(true);
    }else{
        $result=array(false, 'Wrong email or password');
        if(isset($_POST['login'])){
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $password = $_POST['password'];
            $sql = 'SELECT * FROM user WHERE `e-mail` = "'.$email.'"';
            $database = new database();
            $item = $database->getOne($sql);
            if($item!=null){
                // control
                if($email == $item['e-mail'] && password_verify($password, $item['password'])){
                    
                $_SESSION['sessionId']=session_id();
                $_SESSION['nameUser']=$item['nameUser'];
                $_SESSION['userId']=$item['idUser'];
                $_SESSION['status'] = $item['status'];//0-client 1-admin
                $result = array(true);        
                };
            }
        }
    }
        return $result;
    } // function
}//class MainModel