<?php
include_once 'header.php';
?>

<section>
    <div class="container">
        <div class="row">

            <?php
            if (isset($content)) {
                echo $content;
            }
            ?>                    

        </div> <!--class="row"-->
    </div> <!--class="container-->
</section>

<?php
include_once 'footer.php';
?>