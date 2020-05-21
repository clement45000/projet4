<?php
ob_start();
?>

<div class="container shadow p-3 mb-5 border border-bg-dark bg-white mt-5 mb-5 pl-5 pr-5">
    <div class="bg-dark text-light">
         <h1 class="text-center mt-5 pt-5" > Retrouvez tout mes articles</h1>
        <p class="text-center mt-3 pb-5">Bonne lecture à vous en espérant que cela vous plaise</p>
    
        












        

<?php
$content = ob_get_clean();
require "views/commons/template.php";
?>