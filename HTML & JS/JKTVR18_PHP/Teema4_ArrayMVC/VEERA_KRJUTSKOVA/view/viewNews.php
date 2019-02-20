<?php
ob_start();
?>
<div>
    <h3>  <?php echo '<hr>'.$oneNews['title']?>  </h3>
</div>

<?php
        
        $path = 'public/news/';
            if(file_exists($path.$oneNews['news']) && $oneNews['news']!= ''){
                include $path.$oneNews['news'];
            }else{
                echo '<p>Новостей не завезли</p>';
            }
        
$content = ob_get_clean();
include_once 'view/templates/layout.php';