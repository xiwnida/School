<html>
<head>
<link href="public/css/bootstrap.min.css" rel="stylesheet">
<link href="public/css/mystyle.css" rel="stylesheet">
<link href="public/css/mystyle2.css" rel="stylesheet">
</head>
<body>
    <div class="container">
      <div class="header clearfix">
	  <h2>Файлы Министерства магии</h2>
        <h4 class="text-muted">
            <a href="./">Главная</a> &#187;
            <a href="Classes">Классификация магических существ</a> &#187;
            <a href="Depts">Отделы Министерства магии</a>
	
            
            <?php
        //breadscrumb
        //Навигация - пояснение - название выбранной книги
        if(isset($Beast['name'])){
            echo ' &#187;'.$Beast['name'];
        }
        
        ?>
            
            
        </h4>
      </div>	
        <?php
        if(isset($contentClasses)){
            echo $contentClasses;
        }
        ?>
      <div id="content" style="padding-top:20px;">
          
	<?php
        //$menu - для стран и флагов
        if(isset($menu)){
            echo '<div class="left">';
            echo $menu;
            echo '</div>';
            echo '<div class="right">';
            
        
            
        }
        
        
        
        
        
        //изменяющийся контент $content
        if(isset($content)){
            echo $content;
        }
        
        if(isset($menu)){
           echo '</div>'; 
        }
        
        
        
         ?>
		
         
	
      </div>
      <footer class="footer">
        <p>&copy; 2019 DESIGN JKTVR18</p>
      </footer>
    </div> <!-- container -->
</body>
</html>