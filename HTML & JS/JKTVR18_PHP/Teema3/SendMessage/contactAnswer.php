<?php
include 'contactSend.php';

$test= sendContact();

include_once 'header.html';

echo $test[1];
echo '<hr><p><a href="./">Форма сообщения</a></p>';

include_once 'footer.html';