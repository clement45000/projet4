<?php
ob_start();
?>
<p> COMMENTAIRE IGNORE </p>

<?php
$content = ob_get_clean();
require "views/commons/template.php";
?>





