<?php
ob_start();
?>


<a href="admin" class="btn btn-primary mt-5 ml-5">Retour à l'admin</a>

<div  class="container mt-5">

<h1 class="text-center mt-5 ">Ajouter un article</h1>
<?php if($unvalid !== ""){ ?> <div class="alert alert-danger text-center mt-5" role="alert"> <?= htmlspecialchars($unvalid)?> </div> <?php } ?>
<?php if($validpost !== ""){ ?> <div class="alert alert-success text-center mt-5" role="alert"> <?= htmlspecialchars($validpost)?> </div> <?php } ?>      
        
    <form action="createpost" method="post">
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" class="form-control" placeholder= "Entrez votre titre" value="<?=htmlspecialchars($title_art) ?>" >
        </div>
        <div class="form-group">
            <label for="content">Contenu de l'article</label>
            <textarea class="form-control" id="content" name="content"  placeholder= "Ecrivez votre article"><?=$content_art?></textarea>
        </div>
        <div class="form-group">
            <label for="author">Auteur</label>
            <input type="text" name="author" id="author" class="form-control" placeholder= "Entrez le nom de l'auteur" value="<?= htmlspecialchars($author_art) ?>">
        </div>
        <button type="submit" class="btn btn-primary mb-5 ">Publier votre article</button>
        </form>
    </div>

<?php
$content = ob_get_clean();
require "views/commons/template.php";
?>