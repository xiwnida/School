<?php

ob_start();
?>
<hr>
<?php






$content = ob_get_clean();
include_once 'view/templates/layout.php';