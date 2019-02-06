<?php
ob_start();
?>
<h2><?php echo $title; ?></h2>
<?php
//book list - массив книг
        echo '<article>';
            echo '<h3>'.$book['bookname'].'</h3>';  
            echo '<img src="public/images/'.$book['image'].'">';
            echo '<p>Authors: '.$book['author'].'</p>';
            echo '<p>Price: '.$book['price'].'</p>';
            echo '<p>Price: '.$book['description'].'</p>';
            echo '<p><a href="Books"  >  К списку книг  </a></p>';
        echo '</article>';
        
    //$book['bookname'] = '';
?>

<?php
$content = ob_get_clean();
include_once 'view/templates/layout.php';