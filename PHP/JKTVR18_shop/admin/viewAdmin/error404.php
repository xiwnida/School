<?php ob_start() ?>
<h2>404 ошибка  </h2>
<article>
<p>
	<h3>Страница не найдена</h3>
	
</p>

</article>

<?php $content = ob_get_clean(); ?>

<?php include "viewAdmin/templates/layout.php";