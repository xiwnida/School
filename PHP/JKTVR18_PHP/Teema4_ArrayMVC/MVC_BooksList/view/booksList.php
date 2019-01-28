<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

ob_start();
?>
<h2>Список книг</h2>
<?php
//book list - массив книг
    foreach ($booksList as $book){
        echo '<article>';
            echo '<h3>'.$book['bookname'].'</h3>';  
            echo '<img src="public/images/'.$book['image'].'">';
        echo '</article>';
    }
    $book['bookname'] = '';
?>

<?php
$content = ob_get_clean();
include_once 'view/templates/layout.php';