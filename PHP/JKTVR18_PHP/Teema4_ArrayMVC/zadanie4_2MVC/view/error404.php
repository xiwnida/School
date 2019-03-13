<?php

ob_start();

?>

<h2>ERROR 404</h2>
<article>
    <p>
        По вашему запросу ничего не найдено
    </p>
    <img src="https://learn.getgrav.org/user/pages/11.troubleshooting/01.page-not-found/error-404.png" style="width: 500px;">
</article>

<?php
$content= ob_get_clean();
include_once 'view/templates/layout.php';