<?php

ob_start();

?>

<h2><?php echo $title;   ?></h2>

<?php
//$booksList - массив книг из контроллера
//foreach ($booksList as $book){
echo '<h4>'.$Beast['classname'].'</h4>';
 


echo '<article>';

echo '<img src="public/img/'.$Beast['image'].'" style="width: 240px;">';

echo '<h4>'.$Beast['text'].'</h4>';

echo '<h4><a href="Classes"  >К списку существ</a></h4>';

echo '</article>';
//}
//$book['bookname']="";
?>
<?php
$content= ob_get_clean();
include_once 'view/templates/layout.php';