<?php 
include_once 'header.php';
?>

<section>
        <div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="left-sidebar">
					<h2>Category</h2>
					<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							
						
						<?php
                                                //Меню по категориям
                                                if(isset($categoryMenu)){
                                                    echo $categoryMenu;
                                                }
                                                ?>
						
					</div><!--/category-products-->
                                                
                                        <h2>Category Type</h2>
					<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							
						
						<?php
                                                //Меню по категориям
                                                if(isset($typeMenu)){
                                                    echo $typeMenu;
                                                }
                                                ?>
						
					</div><!--/category-products-->
                                </div><!--left sitebar-->
                        </div><!--col-sm-3-->
                                
                        <div class="col-sm-9 padding-right">
				<div class="features_items"><!--features_items-->
					<h2 class="title text-center">Products</h2>
                                                
                                                <?php
                                                
                                                if(isset($content)){
                                                    echo $content;
                                                }
                                                
                                                ?>
                                </div>
                        </div>
                </div>
        </div>
</section>

<?php
include_once 'footer.php';
?>