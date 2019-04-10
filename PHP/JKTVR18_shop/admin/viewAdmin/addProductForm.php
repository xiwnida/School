<div class="container" style="min-height:400px;">
<div class="col-md-11">	

    <form method='POST' action="addProductResult" enctype="multipart/form-data">
<table class='table table-bordered'>
    <tr>
        <td>Name Product</td>
        <td><input type='text' name='nameProduct' class='form-control' required></td>
    </tr>
    <tr>
        <td>Price</td>
        <td><input type='text' name='price' class='form-control' required></td>
    </tr>        		
    <tr>
        <td>Category</td>
        <td>
            <select name="idCategory" class="form-control" >
                <?php  
                foreach($categoryList as $category){
                    echo '<option value="'.$category['idCategory'].'"';
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
                    echo '<option value="'.$type['idType'].'"';
                    echo '>'.$type['nameType'].'</option>'; 
                
                }
                ?>
            </select>
        </td>
    </tr>		
    <!--          image-->		
    <tr>
        <td>Picture</td>
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