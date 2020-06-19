<?php
ob_start();
?>
    <div class='container text-center mt-5'>
   <p class="h1 font-weight-bold  ">Oups une erreur s'est produite</p>
    <p class= "h3 mt-3 "><?=htmlspecialchars($errorMessage)?></p>
        <div>
        <img src="<?= URL ?>public/images/error.jpg"  alt="Responsive image" class="mt-5" width='30%'>
   </div>

<?php
$content = ob_get_clean();
require "views/commons/template.php";
?>