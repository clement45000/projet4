<?php
ob_start();
?>


<div class="container">
<p>Votre commentaire à bien été ajouté</p>
</div>


<?php
$content = ob_get_clean();
require "views/commons/template.php";
?>