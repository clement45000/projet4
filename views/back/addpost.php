<?php
ob_start();
?>


<a href="?page=admin" class="btn btn-primary mt-5 ml-5">Retour à l'admin</a>

<div class="container mt-5">

<h1 class="text-center mt-5 ">Ajouter un article</h1>

<?php if ($unvalid): ?>
<div class="alert alert-danger">
<?= $unvalid ?>
</div>
<?php endif ?>



    <form action="?page=createpost" method="post">
        <div class="form-group">
            <label for="Titre">Titre</label>
            <input type="text" name="title" id="title" class="form-control" placeholder= "Entrez votre titre" >
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" id="datepost" class="form-control" placeholder= "Entrez la date du jour" >
        </div>
        <div class="form-group">
            <label for="content">Contenu de l'article</label>
            <textarea class="form-control" id="content" name="content"  placeholder= "Ecrivez votre article" ></textarea>
        </div>
        <div class="form-group">
            <label for="Author">Auteur</label>
            <input type="text" name="author" id="author" class="form-control" placeholder= "Entrez le nom de l'auteur" >
        </div>
        <button type="submit" class="btn btn-primary">Publier votre article</button>
        </form>
    </div>

<?php
$content = ob_get_clean();
require "views/commons/template.php";
?>