<?php
ob_start();
?>
<h1>Ceci est ma page d'accueil</h1>



<?php
$content = ob_get_clean();
$title = 'Accueil';
require "views/commons/template.php";
?>





