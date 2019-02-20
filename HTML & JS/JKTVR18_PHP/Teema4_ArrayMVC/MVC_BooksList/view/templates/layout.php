<html>
<head>
<link href="public/css/bootstrap.min.css" rel="stylesheet">
<link href="public/css/mystyle.css" rel="stylesheet">
<link href="public/css/mystyle2.css" rel="stylesheet">
</head>
<body>
    <div class="container">
      <div class="header clearfix">
	  <h2>Example MVC technology Array</h2>
        <h4 class="text-muted">
            <a href="./">Главная</a> &#187;
            <a href="Books">Книги</a> &#187;
            <a href="Countries">Страны и флаги</a> 
	<?php
        // breadscrumb
        //навигация, пояснение, название выбранной книги
        if(isset($book['bookname'])){
            echo '&#187;'.$book['bookname'];
        }
        ?>		
        </h4>
      </div>	  
      <div id="content" style="padding-top:20px;">		
	<?php
        //менюю для стран и флагов
        if(isset($menyu)){
            echo '<div class="left">';
            echo $menyu;
            echo '</div>';
            echo '<div class="right">';
        }
        
        
        // изменяющийся контент
        if(isset($content)){
            echo $content;
        }
        if(isset($menyu)){
            echo '</div>'; //закрываем right div если есть меню
        }
        ?>
      </div>
      <footer class="footer">
        <p>&copy; Dessign 2019 JKTVR18</p>
      </footer>
    </div> <!-- container -->
</body>
</html>