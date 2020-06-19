<?php
ob_start();
?>

    <div id="container_biographie" class="container text-secondary border border-bg-dark bg-white mt-5 pl-5 pr-5 pb-5 mb-5 shadow-lg p-3 mb-5 bg-dark rounded text">
        
        <div class="bg-dark text-light ">
            <h1 id="title_biographie" class="text-center mt-5 pt-5 ">Biographie de Jean Forteroch</h1>
            <p class="text-center pb-5">Mon histoire en quelques lignes</p>
            <img id="imgbiographie" class="simg" src="<?= URL ?>public/images/111.jpg"> 
        </div>
        <hr id="hr_biographie" class="mt-5">
        <h2 id="second_titlebiographie" class="text-center text-dark"><?=htmlspecialchars($biographie['biographie_title'])?></h2>
        <div id="text_biographie">
        <div class="mt-5">
        <?= htmlspecialchars($biographie['bio_content'])?>
        </div>
      

    </div>


<?php
$content = ob_get_clean();
require "views/commons/template.php";
?>