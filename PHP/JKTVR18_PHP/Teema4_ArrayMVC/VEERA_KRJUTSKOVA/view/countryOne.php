<?php
ob_start();
?>
<h2><?php echo $country['country']; ?></h2>
<?php
//book list - массив книг
        echo '<hr><img src="public/images/'.$country['image'].'" class="planet"><hr>';
        echo '<h2>Столица: '.$country['capital'].'</h2>';
        echo '<img src="public/images/'.$country['capital_image'].'"><hr>';
        include 'public/countries/'.$country['info'];
        echo '<img src="public/images/'.$country['map'].'"><hr>';
        echo '<p><a href="Country"  >  К списку стран  </a></p>';
        
    //$book['bookname'] = '';
?>

<?php
$content = ob_get_clean();
include_once 'view/templates/layout.php';