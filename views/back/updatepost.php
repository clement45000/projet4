<?php
ob_start();
?>

<a href="?page=admin" class="btn btn-primary mt-5 ml-5">Retour à l'admin</a>

<div class="container mt-5">
<h1 class="text-center mt-5 ">Modifier un article</h1>
    <form method="POST" action="">
        <div class="form-group">
            <label for="Titre">Titre</label>
            <input type="text" name="title" id="title" class="form-control" placeholder= "Entrez votre titre" required>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="text" name="datearticle" id="datearticle" class="form-control" placeholder= "Entrez la date du jour" required>
        </div>
        <div class="form-group">
            <label for="content">Contenu de l'article</label>
            <textarea class="form-control" id="content" name="content"  required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Publier votre article</button>
        </form>
    </div>

<?php
$content = ob_get_clean();
require "views/commons/template.php";
?>