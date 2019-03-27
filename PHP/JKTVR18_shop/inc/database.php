<?php

class database {
    private $conn;
    private $host;
    private $user;
    private $password;
    private $baseName;
    
    function __construct() {
        $this->conn=false;
        $this->host='localhost';
        $this->user='root';
        $this->password='';
        $this->baseName='jktvr18_shop';
        $this->connect();
    }
    function __destruct() {
        $this->disconnect();
    }
  //----------------------пользовательские функции
  function connect(){
      try{

//$this->conn = new PDO('mysgl:host='.$this->host.';dbname='.$this->baseName, $this->user, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));          
$this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->baseName, $this->user, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));             
 } catch (Exception $ex) {
die("Connected failed: ".$ex->getMessage());
      }
      return $this->conn;
  }//connect
  
    function disconnect(){
        if($this->conn){
            $this->conn=null;
        }
    }
   //-----------------для запросов SELECT(2), actions
    
    //--- select - 1 запись из таблицы
    
    function getOne($query){
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $response=$stmt->fetch();
        return $response;
    }
    
    //--- select - массив данных из таблицы
    
    function getAll($query){
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $response=$stmt->fetchAll();//!! foreach
        return $response;
    }
    //--- actions INSERT, UPDATE DELETE
    
    function executeRun($query){
        
        $response=$this->conn->exec($query);
        return $response;
    }
    
    // --- получение последнего ID после вставки (INSERT)
    function getLastId(){
        
        $lastId=$this->conn->LastInsertId();
        return $lastId;
    }
    
}//class
