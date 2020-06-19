<?php
ob_start();
?>
    <a href="admin" class="btn btn-primary mt-5 ml-5">Retour à l'admin</a>

    <div class="container mt-5">
    <h1 class="text-center mt-5 ">Modifier un article</h1>

        <form  action="updatepost&id=<?= $_GET['id']?>" method="post">

            <div class="form-group">
                <label for="Titre">Titre</label>
                <input type="text" name="title" id="title" class="form-control" value="<?=htmlspecialchars($update['title_post'])?>">
            </div>

            <div class="form-group">
                <label for="content">Contenu de l'article</label>
                <textarea class="form-control" id="tinymce" name="content" ><?=htmlspecialchars($update['content_post'])?></textarea>
            </div>

            <div class="form-group">
                <label for="Auteur">Auteur</label>
                <input type="text" name="author" id="auteur" class="form-control" value="<?=htmlspecialchars($update['author_post'])?>">
            </div>

            <button type="submit" class="btn btn-primary mb-5">Publier votre article</button>
            </form>
        </div>

<?php
$content = ob_get_clean();
require "views/commons/template.php";
?>