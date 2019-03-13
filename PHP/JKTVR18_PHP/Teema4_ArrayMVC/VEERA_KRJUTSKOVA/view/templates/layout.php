<html>
<head>
<link href="public/css/bootstrap.min.css" rel="stylesheet">
<link href="public/css/style.css" rel="stylesheet">
</head>
<body>
    <div class="container">
      <div class="header clearfix">
          <center><h2>Страны мира</h2>
        <h4 class="text-muted">
            <a href="./">На главную</a>
        </h4></center>
      </div>	  
        <center><div class="content" style="padding-top:20px;">		
	<?php
        //менюю для стран и флагов
        if(isset($menu)){
            echo '<div class="left">';
            echo $menu;
            echo '</div>';
            echo '<div class="right">';
        }
        
        
        // изменяющийся контент
        if(isset($content)){
            echo $content;
        }
        if(isset($menu)){
            echo '</div>'; //закрываем right div если есть меню
        }
        ?>
            </div></center>
      <footer class="footer">
          <center><p>&copy; Veera Krjutskova 2019 JKTVR18</p></center>
      </footer>
    </div> <!-- container -->
</body>
</html>