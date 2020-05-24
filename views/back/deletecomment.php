<?php
ob_start();
?>
<div class="container alert alert-success mt-5">
<p class="text-center"> Votre commentaire a été supprimé avec succès </p>
<button>
</div>

<?php
$content = ob_get_clean();
require "views/commons/template.php";
?>