<?php
ob_start();
?>
<div class="container alert alert-success mt-5 text-center">
<p class="text-center h2 mt-3 "> Votre commentaire a été ajouté avec succès </p>
<a href="<?= URL ?>home" class="btn btn-primary mt-5 ml-5 text-center mb-5">Retour à l'accueil</a>
</div>

<?php
$content = ob_get_clean();
require "views/commons/template.php";
?>