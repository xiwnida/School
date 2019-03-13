<?php
ob_start();
?>
<h2>Список книг</h2>
<?php
//book list - массив книг
    foreach ($countriesList as $oneCountry){
        echo '<article>';
            echo '<h3>'.$oneCountry['country'].'</h3>';  
            echo '<img src="public/images/'.$oneCountry['flag'].'" class="flag"><br>';
            echo '<a href="detail?title='.$oneCountry['name'].'">Узнать о стране</a><hr>';
        echo '</article>';
    }
    $book['bookname'] = '';
?>

<?php
$content = ob_get_clean();
include_once 'view/templates/layout.php';