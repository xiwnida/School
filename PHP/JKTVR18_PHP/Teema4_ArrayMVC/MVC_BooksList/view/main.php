<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

ob_start();
?>
<h2>Проект MVC технологии. Массив Books - книги.</h2>
<article>
    <p>
        Просмотр списка книг и детальной информации по одной книге.
        <?php echo '<p><a href="Books"  >  К списку книг  </a></p>'; ?>
    </p>
</article>

<?php
$content = ob_get_clean();
include_once 'view/templates/layout.php';