<div class="container" style="min-height:400px;">
<div class="col-md-11">	

    <form method='POST' action="editProductResult?id=<?php echo $id; ?>" enctype="multipart/form-data">
<table class='table table-bordered'>
    <tr>
        <td>Name Product</td>
        <td><input type='text' name='nameProduct' class='form-control' required value="<?php echo $product['nameProduct']; ?>"></td>
    </tr>
    <tr>
        <td>Price</td>
        <td><input type='text' name='price' class='form-control' required value="<?php echo $product['price']; ?>"></td>
    </tr>        		
    <tr>
        <td>Category</td>
        <td>
            <select name="idCategory" class="form-control" >
                <?php  
                foreach($categoryList as $category){
                    echo '<option value="'.$category['idCategory'].'" ';
                    
                    if($category['idCategory'] == $product['idCategory']){
                        echo 'selected';
                    }
                    
                    echo '>'.$category['nameCategory'].'</option>'; 
                
                }
                ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>Type</td>
        <td>
            <select name="idType" class="form-control" >
                <?php  
                foreach($typeList as $type){
                    echo '<option value="'.$type['idType'].'" ';
                    
                    if($type['idType'] == $product['idType']){
                        echo 'selected';
                    }
                    
                    echo '>'.$type['nameType'].'</option>'; 
                
                }
                ?>
            </select>
        </td>
    </tr>		
    <!--          image-->
    
    <tr>
        <td>Old picture</td>
        <td>
            <img src="../images/<?php echo $product['picture']; ?>" width="20%">
            <div>
                <input type="text" readonly name="oldPicture" value="<?php echo $product['picture']; ?>">
            </div>
        </td>
    </tr>
    <tr>
        <td>New picture</td>
        <td>
            <div>
                <input type="file" name="picture">

            </div>
        </td>
    </tr>	
    <!--        end  image-->
    <tr>
        <td colspan="2">
            <button type="submit" class="btn btn-primary" name="send">
                Сохранить
            </button>  
            <a href="productAction" class="btn btn-large btn-success">
             Назад к списку
             </a>
        </td>
    </tr>
</table>
</form> 

</div>			
</div>
<?php $content = ob_get_clean(); ?>

<?php include "viewAdmin/templates/layout.php"; ?>