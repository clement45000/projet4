<?php
ob_start();
?>

<div class="container text-center alert alert-success">
<p>Votre commentaire a été signalé</p>
</div>

<?php
$content = ob_get_clean();
require "views/commons/template.php";
?>