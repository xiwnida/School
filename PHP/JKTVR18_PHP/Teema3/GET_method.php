<h2>Method GET</h2>
<form method="GET" action="GET_method.php">
    <label>ваше имя</label>
    <input type="text" name="firstname" placeholder="your name" required="">
    <hr>
    <input type="submit" value="SEND">
</form>

<?php

if (isset( $_GET['firstname'])){
    $firstname=$_GET ['firstname']; 
    echo '<p>Hello,'.$firstname.'</p';
}else{
echo '<p>Заполните поле<p>';
    
}
?>


    <hr>
    <h2>method POST</h2>
    <form method="POST"
          action="GET_method.php">
        <label>книга</label>
        <input type="text" name="book"            placeholder="book name" > 
      <br>
  <label>arv</label>    
        <input type="number"      name="quantity"      min="1" max="5">
<br>
        <input type="submit" name="send"    value="SEND POST">
    </form>
    <br>
<?php
if (isset($_POST['send'])){
    $book = $_POST['book']; //
    $quantity = $_POST['quantity'];
    if ($book != "" && $quantity != '') {
        echo '<p>книг ' . $book . ' заказано ' . $quantity . ' шт.</p>';
    } else {
          echo '<p>Заполните поле<p>';  
    }
        
}//isset