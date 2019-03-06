<?php

class database {
    
    private $conn;
    private $host;
    private $user;
    private $password;
    private $daseName;
    
    function __construct() {
        $this->conn = false;
        $this->host = 'localhost';
        $this->user = 'root';
        $this->password = '';
        $this->daseName = 'jktvr18_shop';
        $this->connect();
    }
    
    function __destruct() {
        $this->disconnect();
    }
    
//---------------- дальше пользовательские функции
    
    function connect() {
        try{
            $this->conn = new PDO('mysql:host ='.$this->host.'; dbname = '.$this->baseName, $this->user, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8'));
        } 
        catch (Exception $ex) {
            die("Connection Failed: ".$ex->getMessage());
        }
        
        return $this->conn;
    }//connect
    
    function disconnect() {
        if ($this->conn){
            $this->conn = null;
        }
    }
    
//--------------Методы действия для запросов. SELLECT(2), action
    
    //-----SELLECT - 1 запись из таблицы
    function getOne($query) {
        $stmt = $this->conn->prepare($query);
        $stmt -> execute();
        $stmt -> setFetchMode(PDO::FETCH_ASSOC);
        $response = $stmt->fetch();
        
        return $response;
    }
    
    //----- SELECT - массив данныз из таблицы
    function getAll($query) {
        $stmt = $this->conn->prepare($query);
        $stmt -> execute();
        $stmt -> setFetchMode(PDO::FETCH_ASSOC);
        $response = $stmt->fetchAll(); //--После используется foreach обязательно.
        
        return $response;
    }
    
    //-----Actions INSERT, UPDATE, DELITE
    function executeRun($query) {
        $response = $this->conn->exic($query);
        return $response;
    }
    
}//class
