<?php
include_once 'header.php';
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category Products</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        <?php
                        // меню по категориям
                        if(isset($CategoryMenu)){
                            echo $CategoryMenu;
                        }
                        ?>
                    </div><!--/category-products-->
                    
                    <h2>Category Type</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                       
                    <?php
                        // меню по type
                        if(isset($TypeMenu)){
                            echo $TypeMenu;
                        }
                        ?>    
                        
                    </div><!--/category-products-->
                </div> <!--left-sidebar-->
            </div> <!--col-sm-3-->
            
            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">Products</h2>
                    
                    <?php
                    if (isset($content)){
                        echo $content;
                    }
                    ?>                    
                    
                </div> <!--features_items-->
            </div> <!--col-sm-9 padding-right-->
    
        </div> <!--class="row"-->
    </div> <!--class="container-->
</section>

<?php
include_once 'footer.php';
?>