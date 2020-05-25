<?php
ob_start();
?>
<div class="container alert alert-success mt-5 text-center">
<p class="text-center"> Votre commentaire a été supprimé avec succès </p>
<a href="?page=admin" class="btn btn-primary mt-5 ml-5 text-center mb-5">Retour à l'admin</a>
</div>

<?php
$content = ob_get_clean();
require "views/commons/template.php";
?>