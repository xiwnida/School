<?php

/* 
Обработка формы index.php
 */

function sendContact(){
    $result=array(false, 'Заполните форму');
    if(isset($_POST['send'])){
        $errorString='';
        $yourName=$_POST['name'];
        if(trim($yourName)==''){
            $errorString.='Введите имя <br>';
        }
        $email=filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        if(!$email){//$email==false
            $errorString.='Неправильный эмайл <br>';
        }
        $message=$_POST['message'];
        if(trim($message)==''){
            $errorString.='Введите сообщение <br>';
        }
        //-------------------
        $firstEmail='info@firma.ee';//майл фирмы - куда отправляем
        $subject='Message from company site';
        if($errorString==''){
            $content="Hello, $yourName<br>
                    Cообщение из формы контакт: <br>
                    Отправитель: $yourName <br>
                    Э-майл: $email <br>
                    Комментарий: $message <br>
                    ---End message---";
            mail($firstEmail, $subject, $content);
            //---То, что отправится на нашу страницу
            $sendContent="<h3>Ваше сообщение</h3> $content";
            $sendContent.='<br>Сообщение отправлено!';
            $result=array(true, $sendContent);
            
        }//errorString
        else{
            //есть ошибки
            $errorString="<h3>Ошибки сообщения<br></h3>$errorString";
            $result=array(true, $errorString);
        }//else
        
    }//send
    return $result;
}//funscion