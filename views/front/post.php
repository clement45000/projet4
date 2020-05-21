<?php
ob_start();
?>
    <div class="container">
    <h1 class="mt-5 mb-5 text-center">Titre de l'article</h1>






    
 
<?php
$content = ob_get_clean();
$title = 'Article';
require "views/commons/template.php";
?>





