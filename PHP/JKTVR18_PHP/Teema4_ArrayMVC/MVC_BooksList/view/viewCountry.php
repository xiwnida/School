<?php
ob_start();
?>
<div>
    <h3>Country: <?php echo $name; ?></h3>
</div>

<?php
echo '<div style="float:left; width:400px;">';
        
        $path = 'public/images_country/';
        if(file_exists($path.$country['image']) && $country['image']!= ''){
            echo '<img src="'.$path.$country['image'].'" style="width:300px; height:200px;">';
        }else{
            echo '<p style="width:100px; height:50px;">No photo</p>';
        }//if
        $pathT = 'public/text/';
            if(file_exists($pathT.$country['description']) && $country['description']!= ''){
                echo '<div style="padding-top:200px;"';
                include $pathT.$country['description'];
                echo '</div>';
            }else{
                echo '<p style="width:100px; height:50px;">No description</p>';
            }
        echo '</div>';
        
$content = ob_get_clean();
include_once 'view/templates/layout.php';