<?php
ob_start();
?>
    <a href="<?= URL ?>admin" class="btn btn-primary mt-5 ml-5">Retour à l'admin</a>

    <div class="container mt-5">
    <p class="text-center mt-5 mb-5 h1">Modifiez la biographie</p>

        <form  action="" method="post">

            <div class="form-group">
                <label for="titlebio">Ajouter un sous-titre</label>
                <input type="text" name="titlebio" id="titlebio" class="form-control" value="<?=htmlspecialchars($bio['biographie_title'])?>">
            </div>

            <div class="form-group">
                <label for="content">biographie</label>
                <textarea class="form-control" id="content" name="content_bio" ><?=htmlspecialchars($bio['bio_content'])?></textarea>
            </div>

            <button type="submit" class="btn btn-primary mb-5">Mettre à jour la biographie</button>
            </form>
        </div>

<?php
$content = ob_get_clean();
require "views/commons/template.php";
?>