<?php
ob_start();
?>

<div class="container text-center alert alert-success mt-5">
<p class="mt-3 h3">Votre commentaire a été signalé</p>
<a href="home" class="btn btn-primary mt-5 ml-5 text-center mb-5">Retour à l'accueil</a>
</div>

<?php
$content = ob_get_clean();
require "views/commons/template.php";
?>