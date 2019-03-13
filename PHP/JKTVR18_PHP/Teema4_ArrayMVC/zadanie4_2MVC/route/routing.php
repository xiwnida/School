<?php

/*
 $_SERVER['REQUEST_URI'] - 
 * /
 * /index.php
 * /books
 * /book?name=BOOKNAME
 */

$host=explode('?',$_SERVER['REQUEST_URI'])[0];
//echo $host;
//        /JKTVR18_PHP/zadanie4_1_MVC/...
//достать маршрут books
$n=substr_count($host,'/'); // количество слэшей '/'
$way=explode('/',$host)[$n]; // ... - маршрут
// маршрут указывается в ссылках!!!!

if($way=='' || $way=='index.php' || $way=='index'){
    
   // $classB=new controllerBooks();
   // $response=$classB -> StartSite();
    
    $response= controllerBeasts::startSite();
}
//-- books list
    elseif ($way=='Classes') {
        $response= controllerBeasts::BeastList();
}

//-------------detail book
elseif($way=='detail'){
    
            if(isset($_GET['title'])){
         //--------------читаем название и вывод инфо об одной книге

           $title=$_GET['title'];
           $response= controllerBeasts::detailBeast($title);

        }
        if(isset($_GET['getClass'])){
         //--------------читаем название и вывод инфо об одной книге

           $getClass=$_GET['getClass'];
           $response= controllerClass::ClassList($getClass);

        }
}
//-----------------------------countries and flags
elseif($way=='Depts'){
    $response= controllerDepts:: startSite();//start
}
//-----------------------country One filter
    elseif ($way=='Dept') {
        if (isset($_GET['name'])){
            $deptname=$_GET['name'];
            $response= controllerDepts::Dept($deptname);
            
        }else{
            $response = controllerBeasts::error404();
        }
        
        
    }//elseif
 



else{
   $response= controllerBeasts::error404(); 
}