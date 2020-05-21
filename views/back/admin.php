<?php
ob_start();
?>
<a href="" class="btn btn-primary mt-5 ml-5">Deconnexion</a>
<div class="container">
    <h1 class="text-center mt-5" > Bienvenue sur l'administration du site</h1>
    <table class="table text-center  mt-5">
    <thead class="thead-dark">
        <tr class="">
            <th>Id</th>
            <th>Titre</th>
            <th>Date de publication</th>
            <th colspan="2">Actions</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="align-middle">1</td>
            <td class="align-middle">titre 1<a href=""></a></td>
            <td class="align-middle">11/04/1989</td>
            <td class="align-middle"><a href="?page=updatepost" class="btn btn-primary">Modifier</a></td>

            <td class="align-middle">
                <form method="POST" action="">
                    <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
    </tbody>
    </table>
    <a href="?page=createpost" class="btn btn-success d-block">Ajouter un article</a>
    <h2 class="mt-5">Commentaires signalés</h2>
</div>
<?php
$content = ob_get_clean();
require "views/commons/template.php";
?>