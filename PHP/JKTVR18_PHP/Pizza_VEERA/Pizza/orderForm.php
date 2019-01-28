<!DOCTYPE html>

<?php
$pizzas=array(
  array(
      'name'=>'Классика',
      'price'=>'5',
      'picture'=>'Pizzas/1.jpg',
      'description'=>'Сыр и колбаса'
  ),
    array(
      'name'=>'Вегитриана',
      'price'=>'5.50',
      'picture'=>'Pizzas/2.jpg',
      'description'=>'Сыр, грибы, томаты'
  ),
    array(
      'name'=>'Острая',
      'price'=>'6',
      'picture'=>'Pizzas/3.jpg',
      'description'=>'Сыр, колбаса, оливки, томаты, паприка'
  ),
    array(
      'name'=>'Беконовая',
      'price'=>'7',
      'picture'=>'Pizzas/4.jpg',
      'description'=>'Сыр, бекон, томаты'
  ),
    array(
      'name'=>'Асорти NEW',
      'price'=>'10',
      'picture'=>'Pizzas/5.jpg',
      'description'=>'Сыр, колбаса, грибы, паприка, оливки, томаты, мясо и многое другое'
  )
);
?>

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
            <div class="content2">
            <h2>Какие у нас есть пиццы?</h2>
            <form method='POST' action=''>
                <select name="pizza_more">
                <?php
                foreach ($pizzas as $pizza){
                    echo '<option value="'.$pizza['name'].'">'.$pizza['name'].'</option>';
                }
            
                ?> 
                </select>
                </p>
                <input type="submit" name="more" value="Подробней">
            </form>
            
            <hr>
            <h2>Сделайте заказ</h2>
            
            <form method='POST' action='sendOrder.php'>
                <label>Ваше имя: </label><input type="text" name="name" placeholder="Введите ваше имя" autofocus="" required><br>
                <label>Ваш адрес: </label><input type="text" name="addres" placeholder="Введите ваш адрес" required><br>
                <label>Ваш телефон: </label><input type="text" name="phone" placeholder="Введите ваш телефон" required><br>
                <label>Ваш э-майл: </label><input type="text" name="email" placeholder="Введите ваш э-майл" required></p>
                <label>Какую пиццу желаете заказать?</label>
            
                <select name="pizza">
                <?php
                foreach ($pizzas as $pizza){
                    echo '<option value="'.$pizza['name'].'-'.$pizza['price'].'">'.$pizza['name'].' - '.$pizza['price'].' евро</option>';
                }
            
                ?> 
                </select><br>
                <label>Количество:</label>
                <input type="number" name="how_much" value="1" min="1" max="99" step="1">
                <hr>
                <div>
                <input type="submit" name="send" value="Отправить">
            </form>
            <div>
                <?php
                    if (isset($_POST['more'])){
                        $choice=$_POST['pizza_more'];
                        foreach ($pizzas as $pizza){
                            if ($pizza['name']==$choice){
                                echo '<hr><p>'.$pizza['name'];
                                echo '<p>Компоненты: '.$pizza['description'].'</p>';
                                echo '<img src="'.$pizza['picture'].'" width=400><br>';
                                break;
                            }//if
                        }//foreach
                    }//if isset
                ?>
            </div>
        </div>
        </article>
    
        </div>
        </div>
                
                
    </body>
</html>