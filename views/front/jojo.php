<?php
ob_start();
?>


<p>C'est moi jojo</p>

<?php
$content = ob_get_clean();
require "views/commons/template.php";
?>