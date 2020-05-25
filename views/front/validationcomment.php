<?php
ob_start();
?>


<div class="container">
<p>Vous devez remplir tous les champs</p>
</div>


<?php
$content = ob_get_clean();
require "views/commons/template.php";
?>