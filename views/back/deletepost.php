<?php
ob_start();
?>

<p> supprimer un article et ses commmentaire </p>

<?php
$content = ob_get_clean();
require "views/commons/template.php";
?>