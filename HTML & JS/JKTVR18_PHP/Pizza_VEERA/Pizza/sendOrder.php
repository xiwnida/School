<?php

function sendOrder(){
    $result=array(false, 'Заполните форму');
    if(isset($_POST['send'])){
        $errorString='';
        $pizza=explode('-',$_POST['pizza']);
        $yourName=$_POST['name'];
        if(trim($yourName)==''){
            $errorString.='Введите имя <br>';
        }
        $email=filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        if(!$email){//$email==false
            $errorString.='Неправильный эмайл <br>';
        }
        $addres=$_POST['addres'];
        if(trim($addres)==''){
            $errorString.='Введите адрес <br>';
        }
        $phone=$_POST['phone'];
        if(trim($phone)==''){
            $errorString.='Введите телефон <br>';
        }
        //-------------------
        $firstEmail='info@firma.ee';//майл фирмы - куда отправляем
        $subject='Сообщение из пиццерии';
        if($errorString==''){
            $content="
                    Отправитель: $yourName <br>
                    Адрес: $addres <br>
                    Э-майл: $email <br>
                    Телефон: $phone <br>
                    Пицца: $pizza[0] <br>
                    Сумма заказа:".$pizza[1]*$_POST['how_much']."евро<br><br>
                    Спасибо за ваш заказ.<br>
                    Пицца будет доставлена через 40 минут<br>";
            //mail($firstEmail, $subject, $content);
            //---То, что отправится на нашу страницу
            $sendContent="<h3>Ваш заказ</h3> $content";
            $sendContent.='<br><p>Заказ отправлен!</p>';
            $result=array(true, $sendContent);
            
        }//errorString
        else{
            //есть ошибки
            $errorString="<h3>Ошибки заполнения формы<br></h3>$errorString";
            $result=array(true, $errorString);
        }//else
        
    }//send
    return $result;
}//funscion

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Закажи пиццу</title>
        <meta charset="UTF-8">
        <link href="mystyle.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container">
        <div class="content">
            
            <article>
                
            <h1>Пицца на дом</h1>
            <hr>
            <div class="content3">
<?php

$test= sendOrder();


echo $test[1];
echo '</div><hr><div class="content3"><p><a href="orderForm.php">К форме заказа</a></p>';

?>
</div>
        </article>
    
        </div>
        </div>
                
                
    </body>
</html>