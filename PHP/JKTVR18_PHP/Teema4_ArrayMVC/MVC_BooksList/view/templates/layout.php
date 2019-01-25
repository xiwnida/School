<html>
<head>
<link href="public/css/bootstrap.min.css" rel="stylesheet">
<link href="public/css/mystyle.css" rel="stylesheet">
</head>
<body>
    <div class="container">
      <div class="header clearfix">
	  <h2>Книжный магазин</h2>
        <h4 class="text-muted">
            <a href="./">Главная</a> &#187;
            <a href="Books">Книги</a>
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
        // изменяющийся контент
        if(isset($content)){
            echo $content;
        }
        ?>
      </div>
      <footer class="footer">
        <p>&copy; Dessign 2019 JKTVR18</p>
      </footer>
    </div> <!-- container -->
</body>
</html>